<?php
include "connect.php";
?>

<title>LIST MAHASISWA</title>

<div align="center">
    <fieldset>
    <legend align="center">
        <span><img src="images/btn_warning.png"/>LIST IT_MAN</span>
    </legend>
<?php
echo"<div align=left>";
echo"<a href=petugas_input.php><input type=submit value=Tambah /></a>"; 
echo"</div>";
echo"<p>";
echo"<table border=1 align=center><tr><th>Nama</th><th>Nrp</th><th>Jurusan </th><th>Update Data 
</th><th>Delete Data</th></tr>";

$sql = "SELECT * FROM mahasiswa ORDER BY id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>$row[nama]</td><td>$row[nrp]</td><td>$row[jurusan]</td> ";
        echo "<td><a href=mahasiswa_edit.php?id=$row[id]><div align=center>Edit</div></a></td>";
        echo "<td><a href=mahasiswa_hapus.php?id=$row[id]>
        <div align=center>Hapus</div></a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
echo"</table>";  

mysqli_close($conn);
?>
<br/>
<p>@it-ubs-2016</p>
</fieldset></div>