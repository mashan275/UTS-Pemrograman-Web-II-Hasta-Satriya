<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$user = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM users")
);

$mahasiswa = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM mahasiswa")
);

$matakuliah = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM matakuliah")
);

$admin = mysqli_num_rows(
mysqli_query($koneksi,
"SELECT * FROM users
WHERE status='Admin'")
);

$user_biasa = mysqli_num_rows(
mysqli_query($koneksi,
"SELECT * FROM users
WHERE status='User'")
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard - Sistem Akademik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
    text-decoration:none;
    display:block;
    padding:12px;
    color:#333;
    border-radius:8px;
    margin-bottom:5px;
    transition:0.3s;
}

.active-menu{
    background:#0d6efd;
    color:white !important;
}

.menu:hover{
    background:#0d6efd;
    color:white;
}

.card-stat{
    border:none;
    border-radius:15px;
    transition:0.3s;
}

.card-stat:hover{
    transform:translateY(-5px);
}

</style>

</head>
<body>

<div class="container-fluid">

<div class="row">

<!-- SIDEBAR -->

<div class="col-md-2 sidebar p-3">

<div class="text-center mb-4">

<img src="assets/logo_unsia.png"
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

<a href="dashboard.php" class="menu active-menu">
🏠 Dashboard
</a>

<a href="profil.php" class="menu">
👤 Profil Saya
</a>

<a href="ubah_password.php" class="menu">
🔒 Ubah Password
</a>

<?php if($_SESSION['status']=="Admin"){ ?>

<a href="pengaturan.php" class="menu">
👥 Users
</a>

<?php } ?>

<a href="mahasiswa/index.php" class="menu">
🎓 Mahasiswa
</a>

<a href="matakuliah/index.php" class="menu">
📚 Mata Kuliah
</a>

<?php if($_SESSION['status']=="Admin"){ ?>

<a href="pengaturan.php" class="menu">
⚙️ Pengaturan
</a>

<?php } ?>
<a href="tentang.php" class="menu">
ℹ Tentang
</a>

<a href="logout.php" class="menu">
🚪 Logout
</a>

</div>

<!-- CONTENT -->

<div class="col-md-10 p-4">

<div class="card shadow-sm">

<div class="card-body">

<h2>
Selamat Datang,
<?php echo $_SESSION['username']; ?> 👋
</h2>

<p class="mb-1">
Universitas Siber Asia
</p>

<p>
Login Sebagai
<b>
<?php echo $_SESSION['status']; ?>
</b>
</p>

</div>

</div>

<br>

<!-- STATISTIK -->

<?php if($_SESSION['status']=="Admin"){ ?>

<div class="row">

<!-- USER -->

<div class="col-md-3 mb-3">

<a href="pengaturan.php"
style="text-decoration:none;color:black;">

<div class="card card-stat shadow">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<h5>Total Admin</h5>

<h1>
<p>Administrator</p>
</h1>

<p>User Terdaftar</p>

</div>

<div>

<i class="bi bi-shield-fill-check text-danger"
style="font-size:70px;"></i>

</div>

</div>

</div>

</div>

</a>

</div>

<!-- MAHASISWA -->

<div class="col-md-3 mb-3">

<a href="mahasiswa/index.php"
style="text-decoration:none;color:black;">

<div class="card card-stat shadow">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<h5>Total Mahasiswa</h5>

<h1>
<?php echo $mahasiswa; ?>
</h1>

<p>Data Mahasiswa</p>

</div>

<div>

<i class="bi bi-mortarboard-fill text-success"
style="font-size:70px;"></i>

</div>

</div>

</div>

</div>

</a>

</div>

<!-- MATA KULIAH -->

<div class="col-md-3 mb-3">

<a href="matakuliah/index.php"
style="text-decoration:none;color:black;">

<div class="card card-stat shadow">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<h5>Total Mata Kuliah</h5>

<h1>
<?php echo $matakuliah; ?>
</h1>

<p>Data Mata Kuliah</p>

</div>

<div>

<i class="bi bi-book-fill text-danger"
style="font-size:70px;"></i>

</div>

</div>

</div>

</div>

</a>

</div>

<!-- STATUS LOGIN -->

<div class="col-md-3 mb-3">

<div class="card card-stat shadow">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<h5>Total User</h5>

<h1>
<?php echo $user_biasa; ?>
</h1>

<p>
User Terdaftar
</p>

</div>

<div>

<i class="bi bi-people-fill text-primary"
style="font-size:70px;"></i>

</div>

</div>

</div>

</div>

</div>

</div>
<?php } ?>
<div class="row mt-4">

<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body text-center">

<h1>📅</h1>

<h5>Hari Ini</h5>

<p>

<?php echo date('d-m-Y'); ?>

</p>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body text-center">

<h1>🕒</h1>

<h5>Jam Sekarang</h5>

<p id="jam"></p>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body text-center">

<h1>👤</h1>

<h5>Login Sebagai</h5>

<p>

<?php echo $_SESSION['status']; ?>

</p>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body text-center">

<h1>🛡</h1>

<h5>Status Sistem</h5>

<p class="text-success">

Online

</p>

</div>

</div>

</div>

</div>
<!-- INFORMASI AKUN -->
<?php if($_SESSION['status']=="User"){ ?>

<div class="row">

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body text-center">

<h1>🎓</h1>

<h5>Data Mahasiswa</h5>

<p>
Lihat seluruh data mahasiswa
</p>

<a href="mahasiswa/index.php"
class="btn btn-success">

Buka

</a>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body text-center">

<h1>📚</h1>

<h5>Data Mata Kuliah</h5>

<p>
Lihat seluruh mata kuliah
</p>

<a href="matakuliah/index.php"
class="btn btn-primary">

Buka

</a>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body text-center">

<h1>👤</h1>

<h5>Profil Saya</h5>

<p>
Kelola akun pribadi
</p>

<a href="profil.php"
class="btn btn-warning">

Buka

</a>

</div>

</div>

</div>

</div>

<div class="alert alert-info">

<b>Dashboard User</b><br>

Anda dapat melihat data mahasiswa,
data mata kuliah, serta mengelola profil
dan password akun Anda.

</div>

<?php } ?>
<div class="card shadow mt-4">

<div class="card-header bg-primary text-white">

<i class="bi bi-person-circle"></i>
Informasi Akun

</div>

<div class="card-body">

<table class="table">

<tr>
<td width="200">Username</td>
<td>: <?php echo $_SESSION['username']; ?></td>
</tr>

<tr>
<td>Status</td>
<td>: <?php echo $_SESSION['status']; ?></td>
</tr>

<tr>
<td>Tanggal</td>
<td>: <?php echo date('d-m-Y'); ?></td>
</tr>

<tr>
<td>Jam</td>
<td>: <?php echo date('H:i:s'); ?></td>
</tr>

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
<script>

function updateJam(){

let sekarang = new Date();

let jam =
sekarang.toLocaleTimeString();

document.getElementById("jam")
.innerHTML = jam;

}

setInterval(updateJam,1000);

updateJam();

</script>
</body>
</html>