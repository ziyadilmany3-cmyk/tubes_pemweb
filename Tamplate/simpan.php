<?php
include "koneksi.php";

$nama     = $_POST['nama'];
$kelas    = $_POST['kelas'];
$jurusan  = $_POST['jurusan'];
$jk       = $_POST['jk'];

$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];

/* Cek apakah foto sudah digunakan */

$cek = mysqli_query(
    $conn,
    "SELECT * FROM siswa WHERE foto='$foto'"
);

if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
        alert('Foto sudah digunakan oleh siswa lain!');
        window.history.back();
    </script>
    ";

    exit();
}

/* Upload Foto */

move_uploaded_file(
    $tmp,
    "gambar/".$foto
);

/* Simpan Data */

mysqli_query(
    $conn,
    "INSERT INTO siswa
    (nama,kelas,jurusan,jk,foto)
    VALUES
    (
        '$nama',
        '$kelas',
        '$jurusan',
        '$jk',
        '$foto'
    )"
);

header("Location: tabel.php");
exit();
?>