<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM siswa");
?>
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
<title>Data Siswa</title>

<link rel="stylesheet"
href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>

body{
    background: linear-gradient(135deg,#4aa3c0,#2c7da0);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
}

/* Card */
.table-card{
    max-width: 1200px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

/* Judul */
.table-card h3{
    text-align: center;
    margin-bottom: 25px;
    font-weight: bold;
    color: #2c7da0;
}

/* Header tabel */
.table thead{
    background: #2c7da0;
    color: white;
}

/* Hover */
.table tbody tr:hover{
    background: #eef8ff;
    transition: 0.3s;
}

/* Tombol */
.btn-custom{
    border-radius: 20px;
    padding: 5px 12px;
}

/* Atas */
.top-action{
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* Foto */
.foto{
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #ddd;
}

</style>

</head>

<body>

<div class="table-card">

    <h3>Data Siswa</h3>

    <div class="top-action">

        <a href="form.php"
           class="btn btn-success btn-custom">
            + Tambah
        </a>

        <a href="dashboard.php"
           class="btn btn-secondary btn-custom">
            Kembali
        </a>

    </div>

    <div class="table-responsive">

    <table class="table table-bordered table-hover text-center align-middle">

        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $no = 1;

        while($d = mysqli_fetch_array($data)){
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td>

                <?php
                if($d['foto'] != ""){
                ?>
                    <img src="gambar/<?= $d['foto']; ?>"
                         class="foto">
                <?php
                }else{
                    echo "Tidak ada";
                }
                ?>

            </td>

            <td><?= $d['nama']; ?></td>

            <td><?= $d['kelas']; ?></td>

            <td><?= $d['jurusan']; ?></td>

            <td><?= $d['jk']; ?></td>

            <td>

                <a href="edit.php?id=<?= $d['id']; ?>"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $d['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data?')">
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

    </div>

</div>

</body>
</html>