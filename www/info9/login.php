<?php 

require_once "connect.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

function generate_jwt($headers, $payload, $secret = 'secret') {
	$headers_encoded = base64url_encode(json_encode($headers));
	
	$payload_encoded = base64url_encode(json_encode($payload));
	
	$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
	$signature_encoded = base64url_encode($signature);
	
	$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
	
	return $jwt;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents("php://input", true));

    $sql = "SELECT * FROM user where username = '".mysqli_real_escape_string($conn, $data->username)."'
        AND password = '".mysqli_real_escape_string($conn, $data->password)."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo json_encode(array('error' => 'invalid error'));
    } else {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $headers = array('alg'=>'HS256', 'typ'=>'JWT');
        $payload = array('username' => $username, 'exp' => (time() + 60));
        $jwt = generate_jwt($headers, $payload);
        echo json_encode(array('token' => $jwt));
    }
}