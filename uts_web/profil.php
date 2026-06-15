<?php

session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$query = mysqli_query(
$koneksi,
"SELECT * FROM users
WHERE username='$username'"
);

$data = mysqli_fetch_array($query);

if(isset($_POST['simpan'])){

    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];

    mysqli_query(
    $koneksi,
    "UPDATE users SET
    nama_lengkap='$nama_lengkap',
    email='$email'
    WHERE username='$username'"
    );

    $foto = $_FILES['foto']['name'];

    if(!empty($foto)){

        $lokasi = $_FILES['foto']['tmp_name'];

        move_uploaded_file(
        $lokasi,
        "assets/profile/".$foto
        );

        mysqli_query(
        $koneksi,
        "UPDATE users SET
        foto='$foto'
        WHERE username='$username'"
        );

    }

    echo "
    <script>
    alert('Profil berhasil diperbarui');
    window.location='profil.php';
    </script>
    ";
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Profil Saya</title>

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

<div class="col-md-2 sidebar p-3">

<div class="text-center mb-4">

<img src="assets/logo_unsia.png"
width="90">

<div class="mt-3">

<?php

$q = mysqli_query(
$koneksi,
"SELECT * FROM users
WHERE username='".$_SESSION['username']."'"
);

$u = mysqli_fetch_array($q);

if(empty($u['foto'])){

?>

<img
src="https://via.placeholder.com/70"
width="70"
height="70"
class="rounded-circle shadow">

<?php } else { ?>

<img
src="assets/profile/<?php echo $u['foto']; ?>"
width="70"
height="70"
class="rounded-circle shadow">

<?php } ?>

</div>

<h5 class="mt-3">

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

<a href="profil.php" class="menu active-menu">
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

<a href="tentang.php" class="menu">
ℹ Tentang
</a>

<a href="logout.php" class="menu">
🚪 Logout
</a>

</div>

<div class="col-md-10 p-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">
👤 Profil Saya
</h4>

</div>

<div class="card-body">

<div class="text-center mb-4">

<?php if(empty($data['foto'])){ ?>

<img
src="https://via.placeholder.com/150"
width="150"
height="150"
class="rounded-circle shadow">

<?php } else { ?>

<img
src="assets/profile/<?php echo $data['foto']; ?>"
width="150"
height="150"
class="rounded-circle shadow">

<?php } ?>

</div>

<form method="POST"
enctype="multipart/form-data">

<div class="mb-3">

<label>Nama Lengkap</label>

<input
type="text"
name="nama_lengkap"
value="<?= $data['nama_lengkap']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
value="<?= $data['email']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Username</label>

<input
type="text"
value="<?= $data['username']; ?>"
class="form-control"
readonly>

</div>

<div class="mb-3">

<label>Status</label>

<input
type="text"
value="<?= $data['status']; ?>"
class="form-control"
readonly>

</div>

<div class="mb-3">

<label>Foto Profil</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

💾 Simpan Profil

</button>

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
