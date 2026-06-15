<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$status   = $_POST['status'];

$cek = mysqli_query(
    $koneksi,
    "SELECT * FROM users
    WHERE username='$username'"
);

if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
    alert('Username sudah digunakan!');
    window.location='register.php';
    </script>
    ";

    exit();
}

mysqli_query(
    $koneksi,
    "INSERT INTO users
    (username,password,status)
    VALUES
    ('$username','$password','$status')"
);

echo "
<script>
alert('Registrasi berhasil!');
window.location='login.php';
</script>
";

?>
