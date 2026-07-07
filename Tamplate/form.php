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
<title>Form Pendaftaran</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>
body{
    background: linear-gradient(135deg, #4aa3c0, #2c7da0);
    font-family: 'Segoe UI', sans-serif;
}

.form-card{
    max-width: 500px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.form-card h3{
    text-align: center;
    margin-bottom: 25px;
    font-weight: bold;
    color: #2c7da0;
}

.form-control{
    border-radius: 12px;
    padding: 12px;
}

.btn-custom{
    border-radius: 25px;
    padding: 10px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-custom:hover{
    transform: translateY(-2px);
}
</style>

</head>

<body>

<div class="form-card">

    <h3>Form Pendaftaran Siswa</h3>

    <form action="simpan.php"
          method="POST"
          enctype="multipart/form-data">

        <!-- Nama -->
        <input
            type="text"
            class="form-control mb-3"
            placeholder="Nama"
            name="nama"
            required>

        <!-- Kelas -->
        <select
            class="form-control mb-3"
            name="kelas"
            required>

            <option value="">Pilih Kelas</option>
            <option value="X">Kelas X (10)</option>
            <option value="XI">Kelas XI (11)</option>
            <option value="XII">Kelas XII (12)</option>

        </select>

        <!-- Jurusan -->
        <select
            class="form-control mb-3"
            name="jurusan"
            required>

            <option value="">Pilih Jurusan</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>

        </select>

        <!-- Jenis Kelamin -->
        <label class="mb-2">
            <strong>Jenis Kelamin</strong>
        </label>

        <div class="mb-3">
            <input type="radio"
                   name="jk"
                   value="Laki-laki"
                   required>
            Laki-laki

            &nbsp;&nbsp;

            <input type="radio"
                   name="jk"
                   value="Perempuan">
            Perempuan
        </div>

        <!-- Upload Foto -->
        <label class="mb-2">
            <strong>Foto Siswa</strong>
        </label>

        <input
            type="file"
            class="form-control mb-3"
            name="foto"
            accept="image/*"
            required>

        <!-- Tombol -->
        <button type="submit"
                class="btn btn-success w-100 btn-custom mb-2">
            Simpan
        </button>

        <a href="dashboard.php"
           class="btn btn-secondary w-100 btn-custom">
            Kembali
        </a>

    </form>

</div>

</body>
</html>