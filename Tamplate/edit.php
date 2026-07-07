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
    "SELECT * FROM siswa WHERE id='$id'"
);

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Siswa</title>

<link rel="stylesheet"
href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>

body{
    background:linear-gradient(135deg,#4aa3c0,#2c7da0);
    font-family:'Segoe UI',sans-serif;
}

.form-card{
    max-width:500px;
    margin:50px auto;
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.2);
}

.foto{
    width:100px;
    height:100px;
    object-fit:cover;
    border-radius:10px;
    border:2px solid #ddd;
}

.form-control,
.form-select{
    border-radius:10px;
}

</style>

</head>

<body>

<div class="form-card">

<h3 class="text-center mb-4">
Edit Data Siswa
</h3>

<form action="update.php"
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

    <!-- Nama -->
    <label class="form-label">
        Nama Siswa
    </label>

    <input
        type="text"
        name="nama"
        class="form-control mb-3"
        value="<?= $d['nama']; ?>"
        required
    >

    <!-- Kelas -->
    <label class="form-label">
        Kelas
    </label>

    <select
        name="kelas"
        class="form-select mb-3"
        required>

        <option value="">-- Pilih Kelas --</option>

        <option value="X"
        <?= ($d['kelas']=="X") ? "selected" : ""; ?>>
        X
        </option>

        <option value="XI"
        <?= ($d['kelas']=="XI") ? "selected" : ""; ?>>
        XI
        </option>

        <option value="XII"
        <?= ($d['kelas']=="XII") ? "selected" : ""; ?>>
        XII
        </option>

    </select>

    <!-- Jurusan -->
    <label class="form-label">
        Jurusan
    </label>

    <select
        name="jurusan"
        class="form-select mb-3"
        required>

        <option value="">-- Pilih Jurusan --</option>

        <option value="IPA"
        <?= ($d['jurusan']=="IPA") ? "selected" : ""; ?>>
        IPA
        </option>

        <option value="IPS"
        <?= ($d['jurusan']=="IPS") ? "selected" : ""; ?>>
        IPS
        </option>

    </select>

    <!-- Jenis Kelamin -->
    <label class="form-label">
        Jenis Kelamin
    </label>

    <select
        name="jk"
        class="form-select mb-3"
        required>

        <option value="Laki-laki"
        <?= ($d['jk']=="Laki-laki") ? "selected" : ""; ?>>
        Laki-laki
        </option>

        <option value="Perempuan"
        <?= ($d['jk']=="Perempuan") ? "selected" : ""; ?>>
        Perempuan
        </option>

    </select>

    <!-- Foto Saat Ini -->
    <label class="form-label">
        Foto Saat Ini
    </label>

    <div class="mb-3">

        <?php if($d['foto']!=""){ ?>

            <img
                src="gambar/<?= $d['foto']; ?>"
                class="foto">

        <?php } ?>

    </div>

    <!-- Ganti Foto -->
    <label class="form-label">
        Ganti Foto
    </label>

    <input
        type="file"
        name="foto"
        class="form-control mb-4"
        accept="image/*"
    >

    <!-- Tombol -->

    <button
        type="submit"
        class="btn btn-warning w-100 mb-2">

        Update Data

    </button>

    <a
        href="tabel.php"
        class="btn btn-secondary w-100">

        Kembali

    </a>

</form>

</div>

</body>
</html>