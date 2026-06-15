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

mysqli_query(
$koneksi,
"DELETE FROM mahasiswa
WHERE id='$id'"
);

header("Location: index.php");
exit();

?>
