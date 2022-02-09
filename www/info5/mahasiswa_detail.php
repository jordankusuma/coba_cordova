<?php
header('Access-Control-Allow-Origin: *');
//cross domain
$id = $_GET['id'];
include "connect.php";

$sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$rows = array();

while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

$locations =(json_encode($rows));
echo $locations;
