<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$status   = $_POST['status'];

mysqli_query($koneksi,
"INSERT INTO users(username,password,status)
VALUES('$username','$password','$status')");

header("Location: login.php");

?>