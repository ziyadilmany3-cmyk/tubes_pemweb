<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM mapel WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mata Pelajaran</title>

<link rel="stylesheet"
href="bootstrap-5.3.8-dist/css/bootstrap.min.css">

<style>

body{
    background:linear-gradient(135deg,#4aa3c0,#2c7da0);
}

.form-card{
    max-width:500px;
    margin:70px auto;
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.2);
}

</style>

</head>

<body>

<div class="form-card">

<h3 class="text-center mb-4">
Edit Mata Pelajaran
</h3>

<form action="update_mapel.php" method="POST">

<input type="hidden"
name="id"
value="<?= $d['id']; ?>">

<input type="text"
name="kode_mapel"
class="form-control mb-3"
value="<?= $d['kode_mapel']; ?>"
required>

<input type="text"
name="nama_mapel"
class="form-control mb-3"
value="<?= $d['nama_mapel']; ?>"
required>

<select name="kelas"
class="form-control mb-3">

<option value="10" <?=($d['kelas']=="10")?"selected":"";?>>
Kelas 10
</option>

<option value="11" <?=($d['kelas']=="11")?"selected":"";?>>
Kelas 11
</option>

<option value="12" <?=($d['kelas']=="12")?"selected":"";?>>
Kelas 12
</option>

</select>

<select name="semester"
class="form-control mb-3">

<option value="Ganjil"
<?=($d['semester']=="Ganjil")?"selected":"";?>>
Ganjil
</option>

<option value="Genap"
<?=($d['semester']=="Genap")?"selected":"";?>>
Genap
</option>

</select>

<button class="btn btn-warning w-100 mb-2">
Update
</button>

<a href="mapel.php"
class="btn btn-secondary w-100">
Kembali
</a>

</form>

</div>

</body>
</html>