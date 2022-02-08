<?php
include "connect.php";

$sql = "INSERT INTO mahasiswa (nama,nrp,jurusan) VALUES ('$_POST[nama]','$_POST[nrp]','$_POST[jurusan]')";

if (mysqli_query($conn, $sql)) {
?>
    <script type="text/javascript">
        window.alert('Data Telah DiTambahkan');
        window.location.href = 'mahasiswa.php';
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        window.alert('Data Gagal DiTambahkan');
        window.location.href = 'mahasiswa.php';
    </script>
<?php
}
?>