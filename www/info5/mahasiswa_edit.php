<?php
include "connect.php";

$sql = "UPDATE mahasiswa SET nama = '$_POST[nama]', nrp = '$_POST[nrp]', jurusan = '$_POST[jurusan]' WHERE id = '$_POST[id]'";

if (mysqli_query($conn, $sql)) {
?>
    <script type="text/javascript">
        window.alert('Data Telah DiUBAH');
        window.location.href = 'mahasiswa.php';
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        window.alert('Data gagal DiUBAH !!!');
        window.location.href = 'mahasiswa.php';
    </script>
<?php
}
?>