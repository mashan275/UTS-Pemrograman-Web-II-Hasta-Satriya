<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM mahasiswa WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($koneksi,
    "UPDATE mahasiswa SET
    nim='$nim',
    nama='$nama',
    jurusan='$jurusan'
    WHERE id='$id'");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Edit Mahasiswa</h2>

<form method="POST">

<div class="mb-3">
<label>NIM</label>
<input type="text"
name="nim"
value="<?= $d['nim']; ?>"
class="form-control">
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text"
name="nama"
value="<?= $d['nama']; ?>"
class="form-control">
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text"
name="jurusan"
value="<?= $d['jurusan']; ?>"
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