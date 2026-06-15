<?php

session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['status'] != 'Admin'){
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['simpan'])){

    $username      = $_POST['username'];
    $password      = $_POST['password'];
    $status        = $_POST['status'];
    $nama_lengkap  = $_POST['nama_lengkap'];
    $email         = $_POST['email'];

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE username='$username'"
    );

    if(mysqli_num_rows($cek) > 0){

        echo "
        <script>
        alert('Username sudah digunakan');
        </script>
        ";

    }else{

        mysqli_query(
            $koneksi,
            "INSERT INTO users
            (
            username,
            password,
            status,
            nama_lengkap,
            email
            )
            VALUES
            (
            '$username',
            '$password',
            '$status',
            '$nama_lengkap',
            '$email'
            )"
        );

        echo "
        <script>
        alert('User berhasil ditambahkan');
        window.location='pengaturan.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah User</title>

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

<a href="pengaturan.php" class="menu active-menu">
👥 Users
</a>

<a href="mahasiswa/index.php" class="menu">
🎓 Mahasiswa
</a>

<a href="matakuliah/index.php" class="menu">
📚 Mata Kuliah
</a>

<a href="tentang.php" class="menu">
ℹ Tentang
</a>

<a href="logout.php" class="menu">
🚪 Logout
</a>

</div>

<!-- CONTENT -->

<div class="col-md-10 p-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4 class="mb-0">
➕ Tambah User
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Nama Lengkap</label>

<input
type="text"
name="nama_lengkap"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select"
required>

<option value="">
-- Pilih Status --
</option>

<option value="Admin">
Admin
</option>

<option value="User">
User
</option>

</select>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

💾 Simpan

</button>

<a href="pengaturan.php"
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