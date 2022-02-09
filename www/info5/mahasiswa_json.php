<?php
header('Access-Control-Allow-Origin: *');
//cross domain
include "connect.php";

$sql = "SELECT * FROM mahasiswa ORDER BY id";
$result = mysqli_query($conn, $sql);
$rows = array();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
}

$locations =(json_encode($rows));
echo $locations;
