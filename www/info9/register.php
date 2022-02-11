<?php

/**
* Author : https://roytuts.com
*/

require_once 'connect.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get posted data
    $data = json_decode(file_get_contents("php://input", true));
    
    $sql = "INSERT INTO user(username, password) VALUES('" . mysqli_real_escape_string($conn, $data->username) . "', '" . mysqli_real_escape_string($conn, $data->password) . "')";
    
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo json_encode(array('success' => 'You registered successfully'));
    } else {
        echo json_encode(array('error' => 'Something went wrong, please contact administrator'));
    }
}

?>