<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($koneksi,
    "INSERT INTO mahasiswa(nim,nama,jurusan)
    VALUES('$nim','$nama','$jurusan')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Tambah Mahasiswa</h2>

<form method="POST">

<div class="mb-3">
<label>NIM</label>
<input type="text" name="nim" class="form-control">
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text" name="jurusan" class="form-control">
</div>

<button type="submit" name="simpan"
class="btn btn-success">
Simpan
</button>

<a href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>