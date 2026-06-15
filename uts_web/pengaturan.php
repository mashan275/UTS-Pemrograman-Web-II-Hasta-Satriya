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

if(isset($_GET['aksi']) && $_GET['aksi']=='hapus'){

    $id_hapus = $_GET['id'];

    if($id_hapus == $_SESSION['username']){

        echo "
        <script>
        alert('Tidak bisa menghapus akun sendiri!');
        window.location='pengaturan.php';
        </script>
        ";

        exit();
    }

    mysqli_query(
    $koneksi,
    "DELETE FROM users
    WHERE username='$id_hapus'"
    );

    header("Location: pengaturan.php");
    exit();
}

?>

<!DOCTYPE html>

<html>
<head>

<title>Kelola User</title>

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

<div class="card-header bg-primary text-white">

<div class="d-flex justify-content-between align-items-center">

<h5 class="mb-0">
👥 Kelola User
</h5>

<a href="tambah_user.php"
class="btn btn-success">

➕ Tambah User

</a>

</div>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-light">

<tr>

<th width="60">No</th>
<th>Username</th>
<th>Status</th>
<th width="220">Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

$query = mysqli_query(
$koneksi,
"SELECT * FROM users
ORDER BY username ASC"
);

while($data = mysqli_fetch_array($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td>

<i class="bi bi-person-circle"></i>

<?= $data['username']; ?>

</td>

<td>

<?php if($data['status']=="Admin"){ ?>

<span class="badge bg-danger">

Admin

</span>

<?php } else { ?>

<span class="badge bg-success">

User

</span>

<?php } ?>

</td>

<td>

<a href="edit_user.php?id=<?= $data['id']; ?>"
class="btn btn-warning btn-sm">

✏️ Edit

</a>

<a href="pengaturan.php?aksi=hapus&id=<?= $data['username']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus user ini?')">

🗑 Hapus

</a>

</td>

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
