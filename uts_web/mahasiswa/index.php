<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Data Mahasiswa</h2>

<a href="../dashboard.php" class="btn btn-secondary">
Kembali
</a>

<a href="tambah.php" class="btn btn-primary">
Tambah Mahasiswa
</a>

<hr>

<table class="table table-bordered">

<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>Aksi</th>
</tr>

<?php

$no = 1;

$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

while($d = mysqli_fetch_array($data)){

?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nim']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['jurusan']; ?></td>

    <td>

        <a href="edit.php?id=<?= $d['id']; ?>"
        class="btn btn-warning btn-sm">
        Edit
        </a>

        <a href="hapus.php?id=<?= $d['id']; ?>"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin Hapus?')">
        Hapus
        </a>

    </td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>