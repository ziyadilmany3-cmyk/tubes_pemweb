<?php

include "koneksi.php";

$id=$_POST['id'];
$kode_mapel=$_POST['kode_mapel'];
$nama_mapel=$_POST['nama_mapel'];
$kelas=$_POST['kelas'];
$semester=$_POST['semester'];

mysqli_query($conn,

"UPDATE mapel SET

kode_mapel='$kode_mapel',
nama_mapel='$nama_mapel',
kelas='$kelas',
semester='$semester'

WHERE id='$id'"

);

header("Location: mapel.php");

?>
