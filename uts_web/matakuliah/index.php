<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Data Mata Kuliah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f6fa;
}

.sidebar{
    min-height:100vh;
    background:white;
    border-right:1px solid #ddd;
}

.menu{
    display:block;
    padding:12px;
    text-decoration:none;
    color:#333;
    border-radius:8px;
    margin-bottom:5px;
}

.menu:hover{
    background:#0d6efd;
    color:white;
}

.active-menu{
    background:#0d6efd;
    color:white;
}

</style>

</head>
<body>

<div class="container-fluid">

<div class="row">

<!-- SIDEBAR -->

<div class="col-md-2 sidebar p-3">

<div class="text-center mb-4">

<img src="../assets/logo_unsia.png"
width="90"
class="mb-2">

<h5 class="fw-bold">
UNIVERSITAS<br>
SIBER ASIA
</h5>

<small class="text-muted">
Sistem Akademik
</small>

</div>

<a href="../dashboard.php" class="menu">
🏠 Dashboard
</a>

<a href="../profil.php" class="menu">
👤 Profil Saya
</a>

<a href="../ubah_password.php" class="menu">
🔒 Ubah Password
</a>

<?php if($_SESSION['status']=="Admin"){ ?>

<a href="../pengaturan.php" class="menu">
👥 Users
</a>

<?php } ?>

<a href="../mahasiswa/index.php" class="menu">
🎓 Mahasiswa
</a>

<a href="index.php" class="menu active-menu">
📚 Mata Kuliah
</a>

<a href="../tentang.php" class="menu">
ℹ Tentang
</a>

<a href="../logout.php" class="menu">
🚪 Logout
</a>

</div>

<!-- CONTENT -->

<div class="col-md-10 p-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<div class="d-flex justify-content-between align-items-center">

<h5 class="mb-0">
📚 Data Mata Kuliah
</h5>

<?php if($_SESSION['status']=="Admin"){ ?>

<a href="tambah.php"
class="btn btn-light btn-sm">

➕ Tambah Mata Kuliah

</a>

<?php } ?>

</div>

</div>

<div class="card-body">

<form method="GET">

<div class="row mb-3">

<div class="col-md-4">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari Kode MK atau Nama Mata Kuliah..."
value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">

</div>

<div class="col-md-2">

<button
type="submit"
class="btn btn-primary">

🔍 Cari

</button>

</div>

<div class="col-md-2">

<a href="index.php"
class="btn btn-secondary">

↻ Reset

</a>

</div>

</div>

</form>

<table class="table table-bordered table-striped">

<thead>

<tr>

<th width="60">No</th>
<th>Kode MK</th>
<th>Nama Mata Kuliah</th>
<th>SKS</th>

<?php if($_SESSION['status']=="Admin"){ ?>

<th width="180">Aksi</th>

<?php } ?>

</tr>

</thead>

<tbody>

<?php

$no = 1;

if(isset($_GET['cari'])){

    $cari = $_GET['cari'];

    $data = mysqli_query(
    $koneksi,
    "SELECT * FROM matakuliah
    WHERE kode_mk LIKE '%$cari%'
    OR nama_mk LIKE '%$cari%'
    ORDER BY id DESC"
    );

}else{

    $data = mysqli_query(
    $koneksi,
    "SELECT * FROM matakuliah
    ORDER BY id DESC"
    );

}

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['kode_mk']; ?></td>

<td><?= $d['nama_mk']; ?></td>

<td><?= $d['sks']; ?></td>

<?php if($_SESSION['status']=="Admin"){ ?>

<td>

<a href="edit.php?id=<?= $d['id']; ?>"
class="btn btn-warning btn-sm">

✏️ Edit

</a>

<a href="hapus.php?id=<?= $d['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini?')">

🗑 Hapus

</a>

</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<footer class="text-center mt-4">

<hr>

<p class="text-muted">

© 2026 Universitas Siber Asia<br>
Hasta Satriya - 240401010207

</p>

</footer>

</div>

</div>

</div>

</body>
</html>
