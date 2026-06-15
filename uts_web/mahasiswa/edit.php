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

$id = $_GET['id'];

$query = mysqli_query(
$koneksi,
"SELECT * FROM mahasiswa WHERE id='$id'"
);

$data = mysqli_fetch_array($query);

if(!$data){
    header("Location: index.php");
    exit();
}

if(isset($_POST['update'])){

    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    mysqli_query(
    $koneksi,
    "UPDATE mahasiswa SET
    nim='$nim',
    nama='$nama',
    jurusan='$jurusan'
    WHERE id='$id'"
    );

    echo "
    <script>
    alert('Data mahasiswa berhasil diperbarui');
    window.location='index.php';
    </script>
    ";
}

?>

<!DOCTYPE html>

<html>
<head>

<title>Edit Mahasiswa</title>

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

<div class="card-header bg-warning">

<h4 class="mb-0">
✏️ Edit Mahasiswa
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>NIM</label>

<input
type="text"
name="nim"
value="<?= $data['nim']; ?>"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nama Mahasiswa</label>

<input
type="text"
name="nama"
value="<?= $data['nama']; ?>"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jurusan</label>

<input
type="text"
name="jurusan"
value="<?= $data['jurusan']; ?>"
class="form-control"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

💾 Update

</button>

<a href="index.php"
class="btn btn-secondary">

⬅ Kembali

</a>

</form>

</div>

</div>

<div class="card shadow mt-3">

<div class="card-header bg-info text-white">

Informasi Mahasiswa

</div>

<div class="card-body">

<p>
<b>ID :</b>
<?= $data['id']; ?>
</p>

<p>
<b>NIM :</b>
<?= $data['nim']; ?>
</p>

<p>
<b>Nama :</b>
<?= $data['nama']; ?>
</p>

<p>
<b>Jurusan :</b>
<?= $data['jurusan']; ?>
</p>

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
