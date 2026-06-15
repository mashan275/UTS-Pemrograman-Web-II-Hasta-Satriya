<?php

session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$status   = $_POST['status'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM users
    WHERE username='$username'
    AND password='$password'
    AND status='$status'"
);

$cek = mysqli_num_rows($query);

if($cek > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['status'] = $data['status'];

    header("Location: dashboard.php");
    exit();

}else{

    echo "
    <script>
    alert('Username, Password atau Status Salah!');
    window.location='login.php';
    </script>
    ";

}
?>
