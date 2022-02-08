<!DOCTYPE>
<html>

<head>
    <title>Mahasiswa</title>

<body>
    <div align="center">
        <fieldset>
            <legend align="center">Tambah Data</legend>
            <?php
            echo "<form method=POST action=mahasiswa_input.php> ";
            echo "<table align=center>";
            echo "<tr><td>Nama</td></tr><tr><td> <input type=text name='nama' size=40></td></tr>";
            echo "<tr><td>Nrp</td></tr><tr><td> <input type=text name='nrp' size=40></td></tr>";
            echo "<tr><td>Jurusan</td></tr><tr><td> <input type=text name='jurusan' size=40></td></tr>";
            echo "<tr><td colspan=2><input type=submit value=Tambah> || <a href='mahasiswa.php'>Kembali</a></td></tr>";
            echo "</table>";
            echo "</form>";
            ?>
        </fieldset>
    </div>
</body>

</html>