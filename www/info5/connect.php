<?php
$conn = mysqli_connect("localhost", "coba", "coba", "mahasiswa");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
