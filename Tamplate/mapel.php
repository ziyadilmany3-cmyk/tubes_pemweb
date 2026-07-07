<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM mapel ORDER BY kode_mapel ASC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mata Pelajaran</title>

    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #4aa3c0, #2c7da0);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            padding: 30px 15px;
        }

        .table-card {
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .table-card h2 {
            color: #2c7da0;
            font-weight: bold;
        }

        .btn-custom {
            border-radius: 20px;
        }

        .table th {
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .aksi {
            white-space: nowrap;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width:768px) {

            .container {
                padding: 15px;
            }

            .table-card {
                padding: 15px !important;
            }

            .table-card h2 {
                font-size: 28px;
            }

            .menu-atas {
                flex-direction: column;
                gap: 10px;
            }

            .menu-atas .btn {
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table {
                min-width: 850px;
            }

            .table th,
            .table td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card table-card p-4">

            <h2 class="text-center mb-4">
                Data Mata Pelajaran
            </h2>

            <div class="d-flex justify-content-between flex-wrap mb-3 menu-atas">

                <a href="form_mapel.php"
                    class="btn btn-success btn-custom">
                    + Tambah Mata Pelajaran
                </a>

                <a href="dashboard.php"
                    class="btn btn-secondary btn-custom">
                    Kembali
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover text-center align-middle">

                    <thead class="table-primary">

                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($d = mysqli_fetch_array($data)) {
                        ?>

                            <tr>

                                <td><?= $no++; ?></td>

                                <td><?= $d['kode_mapel']; ?></td>

                                <td><?= $d['nama_mapel']; ?></td>

                                <td><?= $d['kelas']; ?></td>

                                <td><?= $d['semester']; ?></td>

                                <td class="aksi">

                                    <a href="edit_mapel.php?id=<?= $d['id']; ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="hapus_mapel.php?id=<?= $d['id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data mata pelajaran ini?')">
                                        Hapus
                                    </a>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>