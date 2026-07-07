<?php
include "koneksi.php";

$id = $_GET['id'];

/* Ambil data foto */
$data = mysqli_query(
    $conn,
    "SELECT foto FROM siswa WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

/* Hapus file foto */
if($d['foto'] != ""){
    unlink("gambar/".$d['foto']);
}

/* Hapus data */
mysqli_query(
    $conn,
    "DELETE FROM siswa WHERE id='$id'"
);

header("Location: tabel.php");
?>
<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";