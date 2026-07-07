<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SMA IT Ar Rahmah</title>

    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

    <style>
        /* ================= BODY ================= */

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            background:
                linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),
                url('resource/arrahmah.jpeg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* ================= HEADER ================= */

        .header-custom {
            background: rgba(44, 125, 160, .95);
            color: white;
            padding: 25px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .3);
        }

        .user-box {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            font-weight: bold;
        }

        .logout-btn {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* ================= CONTENT ================= */

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ================= MENU CARD ================= */

        .menu-card {
            border-radius: 20px;
            padding: 45px 25px;
            text-align: center;
            color: white;
            transition: .4s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .3);
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .4);
        }

        .card-form {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .card-data {
            background: linear-gradient(135deg, #16a085, #0e6655);
        }

        .card-guru {
            background: linear-gradient(135deg, #8e44ad, #6c3483);
        }

        .card-mapel {
            background: linear-gradient(135deg, #f39c12, #d68910);
        }

        .menu-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .menu-card h3 {
            margin-bottom: 15px;
        }

        .menu-card p {
            font-size: 16px;
        }

        /* ================= FOOTER ================= */

        footer {
            background: rgba(44, 125, 160, .95);
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width:768px) {

            .user-box {
                position: static;
                transform: none;
                text-align: center;
                margin-bottom: 10px;
            }

            .logout-btn {
                position: static;
                transform: none;
                display: block;
                margin: 15px auto 0;
            }

            .header-custom h1 {
                font-size: 28px;
            }
        }
    </style>

</head>

<body>

    <!-- ================= HEADER ================= -->

    <div class="header-custom text-center">

        <div class="user-box">
            Halo, <strong><?php echo $_SESSION['username']; ?></strong>
        </div>

        <h1>SMA IT Ar Rahmah</h1>

        <p>
            Selamat Datang di Sistem Informasi Sekolah SMA IT Ar Rahmah
        </p>

        <a href="logout.php"
            class="btn btn-light logout-btn"
            onclick="return confirm('Apakah Anda yakin ingin logout?');">
            Logout
        </a>

    </div>

    <!-- ================= CONTENT ================= -->

    <div class="container content">

        <div class="row justify-content-center w-100">

            <!-- FORM PENDAFTARAN -->

            <div class="col-md-3 mb-4">

                <a href="form.php" style="text-decoration:none;">

                    <div class="menu-card card-form">

                        <div class="menu-icon">📝</div>

                        <h3>Form Pendaftaran</h3>

                        <p>Input data siswa baru</p>

                    </div>

                </a>

            </div>

            <!-- DATA SISWA -->

            <div class="col-md-3 mb-4">

                <a href="tabel.php" style="text-decoration:none;">

                    <div class="menu-card card-data">

                        <div class="menu-icon">📊</div>

                        <h3>Data Siswa</h3>

                        <p>Melihat data siswa terdaftar</p>

                    </div>

                </a>

            </div>

            <!-- DATA GURU -->

            <div class="col-md-3 mb-4">

                <a href="guru.php" style="text-decoration:none;">

                    <div class="menu-card card-guru">

                        <div class="menu-icon">👨‍🏫</div>

                        <h3>Data Guru</h3>

                        <p>Kelola data guru</p>

                    </div>

                </a>

            </div>

            <!-- DATA MATA PELAJARAN -->

            <div class="col-md-3 mb-4">

                <a href="mapel.php" style="text-decoration:none;">

                    <div class="menu-card card-mapel">

                        <div class="menu-icon">📚</div>

                        <h3>Data Mata Pelajaran</h3>

                        <p>Kelola data mata pelajaran</p>

                    </div>

                </a>

            </div>

        </div>

    </div>

    <!-- ================= FOOTER ================= -->

    <footer>
        © 2026 SMA IT Ar Rahmah
    </footer>

</body>

</html>