<?php

session_start();

include '../koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['status'] != 'Admin'){
    header("Location: index.php");
    exit();
}

if(isset($_POST['simpan'])){

    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa(nim,nama,jurusan)
    VALUES('$nim','$nama','$jurusan')"
    );

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>

<html>
<head>

<title>Tambah Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f6fa;
}

.sidebar{
    min-height:100vh;
    background:#ffffff;
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
width="90">

<h5 class="mt-2">
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

<a href="../pengaturan.php" class="menu">
👥 Users
</a>

<a href="index.php" class="menu active-menu">
🎓 Mahasiswa
</a>

<a href="../matakuliah/index.php" class="menu">
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

<div class="card-header bg-success text-white">

<h4 class="mb-0">
🎓 Tambah Mahasiswa
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>NIM</label>

<input
type="text"
name="nim"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nama Mahasiswa</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jurusan</label>

<input
type="text"
name="jurusan"
class="form-control"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

💾 Simpan

</button>

<a href="index.php"
class="btn btn-secondary">

⬅ Kembali

</a>

</form>

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
