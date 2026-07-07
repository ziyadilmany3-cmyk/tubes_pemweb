<?php
include "koneksi.php";

$nama  = $_POST['nama'];
$mapel = $_POST['mapel'];
$jk    = $_POST['jk'];

$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];

/* Cek apakah foto sudah digunakan */

$cek = mysqli_query(
    $conn,
    "SELECT * FROM guru WHERE foto='$foto'"
);

if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
        alert('Foto sudah digunakan oleh guru lain!');
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

/* Simpan */

mysqli_query(
    $conn,
    "INSERT INTO guru(nama,mapel,jk,foto)
    VALUES(
        '$nama',
        '$mapel',
        '$jk',
        '$foto'
    )"
);

header("Location: guru.php");
exit();
?>