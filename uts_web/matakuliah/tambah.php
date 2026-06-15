<?php

include '../koneksi.php';

if(isset($_POST['simpan'])){

    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];

    mysqli_query($koneksi,
    "INSERT INTO matakuliah(kode_mk,nama_mk,sks)
    VALUES('$kode_mk','$nama_mk','$sks')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Mata Kuliah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Tambah Mata Kuliah</h2>

<form method="POST">

<div class="mb-3">
<label>Kode MK</label>
<input type="text" name="kode_mk" class="form-control">
</div>

<div class="mb-3">
<label>Nama Mata Kuliah</label>
<input type="text" name="nama_mk" class="form-control">
</div>

<div class="mb-3">
<label>SKS</label>
<input type="number" name="sks" class="form-control">
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