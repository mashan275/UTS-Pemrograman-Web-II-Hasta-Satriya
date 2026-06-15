<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['simpan'])){

    $username = $_SESSION['username'];

    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi'];

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE username='$username'
        AND password='$password_lama'"
    );

    if(mysqli_num_rows($cek) > 0){

        if($password_baru == $konfirmasi){

            mysqli_query(
                $koneksi,
                "UPDATE users SET
                password='$password_baru'
                WHERE username='$username'"
            );

            echo "
            <script>
            alert('Password berhasil diubah. Silakan login kembali.');
            window.location='logout.php';
            </script>
            ";

        }else{

            echo "
            <script>
            alert('Konfirmasi password baru tidak cocok!');
            </script>
            ";

        }

    }else{

        echo "
        <script>
        alert('Password lama salah!');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Ubah Password</title>

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

<a href="dashboard.php" class="menu">
🏠 Dashboard
</a>

<a href="profil.php" class="menu">
👤 Profil Saya
</a>

<a href="ubah_password.php" class="menu active-menu">
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

<div class="card-header bg-primary text-white">

<h4 class="mb-0">
🔒 Ubah Password
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Password Lama</label>

<input
type="password"
name="password_lama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password Baru</label>

<input
type="password"
name="password_baru"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Konfirmasi Password Baru</label>

<input
type="password"
name="konfirmasi"
class="form-control"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

💾 Simpan Password

</button>

<a href="dashboard.php"
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
