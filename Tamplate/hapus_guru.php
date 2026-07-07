<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM guru WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

if(file_exists("gambar/".$d['foto'])){
    unlink("gambar/".$d['foto']);
}

mysqli_query(
    $conn,
    "DELETE FROM guru
    WHERE id='$id'"
);

header("Location: guru.php");
?>
