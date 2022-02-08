<?php
include "connect.php";

$sql = "SELECT COUNT(*) JUMLAH FROM mahasiswa WHERE id = '$_GET[id]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) <= 0) {
    ?>
    <script type="text/javascript">
        window.alert('Data gagal DiHAPUS !!!');
        window.location.href = 'mahasiswa.php';
    </script>
    <?php
} else {
    $sql1 = "DELETE FROM mahasiswa WHERE id = '$_GET[id]'";

    if (mysqli_query($conn, $sql1)) {
    ?>
        <script type="text/javascript">
            window.alert('Data Telah DiHAPUS');
            window.location.href = 'mahasiswa.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            window.alert('Data gagal DiHAPUS !!!');
            window.location.href = 'mahasiswa.php';
        </script>
    <?php
    }
}
?>