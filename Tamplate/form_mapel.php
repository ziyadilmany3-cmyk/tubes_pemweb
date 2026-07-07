<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Mata Pelajaran</title>

<link rel="stylesheet"
href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>

body{
    background: linear-gradient(135deg,#4aa3c0,#2c7da0);
}

.form-card{
    max-width:500px;
    margin:70px auto;
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

</style>

</head>

<body>

<div class="form-card">

<h3 class="text-center mb-4">
Tambah Mata Pelajaran
</h3>

<form action="simpan_mapel.php" method="POST">

    <input
        type="text"
        name="kode_mapel"
        class="form-control mb-3"
        placeholder="Kode Mata Pelajaran"
        required>

    <input
        type="text"
        name="nama_mapel"
        class="form-control mb-3"
        placeholder="Nama Mata Pelajaran"
        required>

    <select
        name="kelas"
        class="form-control mb-3"
        required>

        <option value="">Pilih Kelas</option>
        <option value="10">Kelas 10</option>
        <option value="11">Kelas 11</option>
        <option value="12">Kelas 12</option>

    </select>

    <select
        name="semester"
        class="form-control mb-3"
        required>

        <option value="">Pilih Semester</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>

    </select>

    <button class="btn btn-success w-100 mb-2">
        Simpan
    </button>

    <a href="mapel.php"
       class="btn btn-secondary w-100">
       Kembali
    </a>

</form>

</div>

</body>
</html>