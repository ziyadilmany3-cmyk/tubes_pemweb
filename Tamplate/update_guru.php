<?php
include "koneksi.php";

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$mapel = $_POST['mapel'];
$jk    = $_POST['jk'];

$foto_lama = $_POST['foto_lama'];

if($_FILES['foto']['name'] != ""){

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    /* Cek apakah foto dipakai guru lain */

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM guru
        WHERE foto='$foto'
        AND id!='$id'"
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

    move_uploaded_file(
        $tmp,
        "gambar/".$foto
    );

}else{

    $foto = $foto_lama;

}

mysqli_query(
    $conn,
    "UPDATE guru SET
        nama='$nama',
        mapel='$mapel',
        jk='$jk',
        foto='$foto'
    WHERE id='$id'"
);

header("Location: guru.php");
exit();
?>