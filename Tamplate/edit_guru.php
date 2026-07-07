<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM guru WHERE id='$id'"
);

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Data Guru</title>

<link rel="stylesheet"
href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>

body{
    background:linear-gradient(135deg,#4aa3c0,#2c7da0);
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
}

.card{

    max-width:550px;
    margin:50px auto;

    padding:35px;

    border-radius:20px;

    box-shadow:0 15px 35px rgba(0,0,0,.2);

}

.card h2{

    text-align:center;

    margin-bottom:30px;

    color:#2c7da0;

    font-weight:bold;

}

.form-control,
.form-select{

    border-radius:10px;

    padding:10px;

}

.btn{

    border-radius:10px;

    padding:10px;

}

img{

    width:130px;
    height:130px;

    object-fit:cover;

    border-radius:10px;

    margin-bottom:15px;

}

</style>

</head>

<body>

<div class="card bg-white">

<h2>Edit Data Guru</h2>

<form action="update_guru.php"
      method="POST"
      enctype="multipart/form-data">

    <!-- ID -->
    <input
        type="hidden"
        name="id"
        value="<?= $d['id']; ?>"
    >

    <!-- Foto Lama -->
    <input
        type="hidden"
        name="foto_lama"
        value="<?= $d['foto']; ?>"
    >

    <!-- Nama Guru -->
    <div class="mb-3">

        <label class="form-label">
            Nama Guru
        </label>

        <input
            type="text"
            name="nama"
            class="form-control"
            value="<?= $d['nama']; ?>"
            required
        >

    </div>

    <!-- Mata Pelajaran -->
    <div class="mb-3">

        <label class="form-label">
            Mata Pelajaran
        </label>

        <select
            name="mapel"
            class="form-select"
            required
        >

            <option value="">
                -- Pilih Mata Pelajaran --
            </option>

            <?php

            $mapel = mysqli_query(
                $conn,
                "SELECT * FROM mapel ORDER BY nama_mapel ASC"
            );

            while($m = mysqli_fetch_array($mapel)){

            ?>

            <option
                value="<?= $m['nama_mapel']; ?>"
                <?= ($d['mapel']==$m['nama_mapel']) ? "selected" : ""; ?>
            >
                <?= $m['nama_mapel']; ?>
            </option>

            <?php } ?>

        </select>

    </div>

    <!-- Jenis Kelamin -->
    <div class="mb-3">

        <label class="form-label">
            Jenis Kelamin
        </label>

        <select
            name="jk"
            class="form-select"
            required
        >

            <option
                value="Laki-laki"
                <?= ($d['jk']=="Laki-laki") ? "selected" : ""; ?>
            >
                Laki-laki
            </option>

            <option
                value="Perempuan"
                <?= ($d['jk']=="Perempuan") ? "selected" : ""; ?>
            >
                Perempuan
            </option>

        </select>

    </div>

    <!-- Foto Lama -->
    <div class="mb-3">

        <label class="form-label">
            Foto Saat Ini
        </label>

        <br>

        <img
            src="gambar/<?= $d['foto']; ?>"
            alt="Foto Guru"
        >

    </div>

    <!-- Upload Foto Baru -->
    <div class="mb-4">

        <label class="form-label">
            Ganti Foto
        </label>

        <input
            type="file"
            name="foto"
            class="form-control"
            accept="image/*"
        >

    </div>

    <!-- Tombol -->

    <button
        type="submit"
        class="btn btn-warning w-100 mb-2"
    >
        Update Data
    </button>

    <a
        href="guru.php"
        class="btn btn-secondary w-100"
    >
        Kembali
    </a>

</form>

</div>

</body>
</html>