<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM matakuliah WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];

    mysqli_query($koneksi,
    "UPDATE matakuliah SET
    kode_mk='$kode_mk',
    nama_mk='$nama_mk',
    sks='$sks'
    WHERE id='$id'");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Mata Kuliah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Edit Mata Kuliah</h2>

<form method="POST">

<div class="mb-3">
<label>Kode MK</label>
<input type="text"
name="kode_mk"
value="<?= $d['kode_mk']; ?>"
class="form-control">
</div>

<div class="mb-3">
<label>Nama Mata Kuliah</label>
<input type="text"
name="nama_mk"
value="<?= $d['nama_mk']; ?>"
class="form-control">
</div>

<div class="mb-3">
<label>SKS</label>
<input type="number"
name="sks"
value="<?= $d['sks']; ?>"
class="form-control">
</div>

<button type="submit"
name="update"
class="btn btn-primary">
Update
</button>

<a href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>