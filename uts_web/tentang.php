<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tentang Aplikasi</title>

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
    text-decoration:none;
    display:block;
    padding:12px;
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
    color:white !important;
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
width="90">

<h5 class="mt-2">

UNIVERSITAS<br>
SIBER ASIA

</h5>

<small class="text-muted">

Sistem Akademik

</small>

</div>

<a href="dashboard.php" class="menu">
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

<a href="tentang.php"
class="menu active-menu">
ℹ Tentang
</a>

<a href="logout.php" class="menu">
🚪 Logout
</a>

</div>

<!-- CONTENT -->

<div class="col-md-10 p-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">

ℹ Tentang Aplikasi

</h4>

</div>

<div class="card-body">

<div class="text-center">

<img src="assets/logo_unsia.png"
width="120"
class="mb-3">

<h3>

SISTEM AKADEMIK
UNIVERSITAS SIBER ASIA

</h3>

</div>

<hr>

<table class="table table-bordered">

<tr>
<th width="250">Nama Mahasiswa</th>
<td>Hasta Satriya</td>
</tr>

<tr>
<th>NIM</th>
<td>240401010207</td>
</tr>

<tr>
<th>Mata Kuliah</th>
<td>Pemrograman Web</td>
</tr>

<tr>
<th>Framework</th>
<td>PHP Native + Bootstrap 5</td>
</tr>

<tr>
<th>Database</th>
<td>MySQL</td>
</tr>

<tr>
<th>Versi Aplikasi</th>
<td>1.0</td>
</tr>

</table>

<h5 class="mt-4">

Tujuan Sistem

</h5>

<p>

Sistem Akademik Universitas Siber Asia
dibangun untuk membantu pengelolaan
data mahasiswa, data mata kuliah,
serta manajemen pengguna secara
terintegrasi berbasis web.

</p>

<h5>

Fitur Sistem

</h5>

<ul>

<li>Login Multi User</li>

<li>Dashboard Admin dan User</li>

<li>Kelola User</li>

<li>CRUD Mahasiswa</li>

<li>CRUD Mata Kuliah</li>

<li>Profil Pengguna</li>

<li>Ubah Password</li>

<li>Pencarian Data</li>

<li>Statistik Dashboard</li>

</ul>

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