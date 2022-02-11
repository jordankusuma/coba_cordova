<?php

$conn = mysqli_connect("localhost", "coba", "coba", "mahasiswa");

if (!$conn) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
