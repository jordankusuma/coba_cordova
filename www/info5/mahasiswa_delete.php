<?php
header('Access-Control-Allow-Origin: *');
//cross domain
$id = $_GET['id'];
include "connect.php";

$sql = "DELETE FROM mahasiswa WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if($result){
    echo "Sukses Delete"; 
}else{
    echo "gagal";
}
