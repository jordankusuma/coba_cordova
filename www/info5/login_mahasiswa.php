<?php
header('Access-Control-Allow-Origin: *');
include "connect.php";

$username = $_POST['username'];
$password = $_POST['password'];
//$username = 'kevin';
//$password = 'c14180078';
$sql = "SELECT * FROM mahasiswa WHERE nama='".$username."' AND nrp='".$password."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    echo 1; 
} else {
    echo 0;
}