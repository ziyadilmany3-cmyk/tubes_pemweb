<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Guru</title>

    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #4aa3c0, #2c7da0);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-form {
            max-width: 550px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .2);
        }

        .card-form h2 {
            text-align: center;
            color: #2c7da0;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px;
        }

        .btn {
            border-radius: 10px;
            padding: 10px;
        }
    </style>

</head>

<body>

<div class="card-form">

    <h2>Form Data Guru</h2>

    <form action="simpan_guru.php"
          method="POST"
          enctype="multipart/form-data">

        <!-- Nama Guru -->
        <div class="mb-3">
            <label class="form-label">
                Nama Guru
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                placeholder="Masukkan nama guru"
                required>
        </div>

        <!-- Mata Pelajaran -->
        <div class="mb-3">

            <label class="form-label">
                Mata Pelajaran
            </label>

            <select
                name="mapel"
                class="form-select"
                required>

                <option value="">
                    -- Pilih Mata Pelajaran --
                </option>

                <?php

                $query = mysqli_query(
                    $conn,
                    "SELECT * FROM mapel ORDER BY kode_mapel ASC"
                );

                while ($data = mysqli_fetch_array($query)) {

                ?>

                    <option value="<?php echo $data['nama_mapel']; ?>">
                        <?php
                        echo $data['kode_mapel'] . " - " . $data['nama_mapel'];
                        ?>
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
                required>

                <option value="">
                    -- Pilih Jenis Kelamin --
                </option>

                <option value="Laki-laki">
                    Laki-laki
                </option>

                <option value="Perempuan">
                    Perempuan
                </option>

            </select>

        </div>

        <!-- Upload Foto -->
        <div class="mb-4">

            <label class="form-label">
                Foto Guru
            </label>

            <input
                type="file"
                name="foto"
                class="form-control"
                accept="image/*"
                required>

        </div>

        <!-- Tombol -->
        <button
            type="submit"
            class="btn btn-success w-100 mb-2">

            Simpan Data

        </button>

        <a
            href="guru.php"
            class="btn btn-secondary w-100">

            Kembali

        </a>

    </form>

</div>

</body>
</html>