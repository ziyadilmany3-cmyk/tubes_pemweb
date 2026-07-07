<?php
include "koneksi.php";

$kode_mapel = $_POST['kode_mapel'];
$nama_mapel = $_POST['nama_mapel'];
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];

mysqli_query(
    $conn,
    "INSERT INTO mapel(kode_mapel,nama_mapel,kelas,semester)
    VALUES('$kode_mapel','$nama_mapel','$kelas','$semester')"
);

header("Location: mapel.php");
?> 
 