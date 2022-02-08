<title>Mahasiswa</title>
<body>
    <div align="center">
        <fieldset>
            <legend align="center">Edit Data</legend>
            <?php
            include "connect.php";
            $sql = "SELECT * FROM mahasiswa WHERE id='$_GET[id]'";
            
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo "<form method=POST action=mahasiswa_edit.php> ";
            echo "<input type=hidden name=id value='$row[id]'> ";
            echo "<table align=center>";
            echo "<tr><td>Nik</td></tr><tr><td> <input type=text name='nama' value='$row[nama]' size=40></td></tr>";
            echo "<tr><td>Nama</td></tr><tr><td> <input type=text name='nrp' value='$row[nrp]' size=40></td></tr>";
            echo "<tr><td>HP</td></tr><tr><td> <input type=text name='jurusan' value='$row[jurusan]' size=40></td></tr>";
            echo "<tr><td colspan=2><input type=submit value=Update> || <a href='mahasiswa.php'>Kembali</a></td></tr>";
            echo "</table>";
            echo "</form>";
            ?>
        </fieldset>
    </div>
</body>