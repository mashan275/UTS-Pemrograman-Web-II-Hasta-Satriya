<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi_password = $_POST['konfirmasi_password'];

// 1. Cek apakah password lama sesuai dengan yang ada di database
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password_lama'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    // 2. Cek apakah password baru cocok dengan konfirmasinya
    if($password_baru === $konfirmasi_password){
        
        // 3. Update password di database
        $update = mysqli_query($koneksi, "UPDATE users SET password='$password_baru' WHERE username='$username'");
        
        if($update){
            echo "
            <script>
            alert('Password berhasil diubah! Silakan login kembali.');
            window.location='logout.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Gagal mengubah password.');
            window.location='pengaturan.php';
            </script>
            ";
        }

    } else {
        echo "
        <script>
        alert('Konfirmasi password baru tidak cocok!');
        window.location='pengaturan.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('Password lama Anda salah!');
    window.location='pengaturan.php';
    </script>
    ";
}
?>