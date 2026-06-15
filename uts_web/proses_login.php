<?php

session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$status   = $_POST['status'];

$query = mysqli_query($koneksi,
"SELECT * FROM users
WHERE username='$username'
AND password='$password'
AND status='$status'");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $_SESSION['username'] = $username;
    $_SESSION['status'] = $status;

    header("Location: dashboard.php");

}else{

    echo "
    <script>
    alert('Login Gagal');
    window.location='login.php';
    </script>
    ";

}
?>