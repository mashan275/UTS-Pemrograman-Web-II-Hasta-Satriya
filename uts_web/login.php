<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Login - Sistem Akademik UNSIA</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f6fa;
}

.login-card{
    border:none;
    border-radius:15px;
}

.logo{
    width:100px;
}

</style>

</head>
<body>

<div class="container">

<div class="row justify-content-center align-items-center"
style="min-height:100vh;">

<div class="col-md-5">

<div class="card shadow login-card">

<div class="card-body p-4">

<div class="text-center mb-4">

<img src="assets/logo_unsia.png"
class="logo mb-3">

<h4 class="fw-bold">
UNIVERSITAS SIBER ASIA
</h4>

<p class="text-muted">
Sistem Akademik
</p>

</div>

<form action="proses_login.php" method="POST">

<div class="mb-3">

<label class="form-label">
Username
</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Password
</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Status
</label>

<select
name="status"
class="form-select"
required>

<option value="">
Pilih Status
</option>

<option value="Admin">
Admin
</option>

<option value="User">
User
</option>

</select>

</div>

<button
type="submit"
class="btn btn-primary w-100">

🔑 Login

</button>

</form>

<hr>

<p class="text-center mb-0">

Belum punya akun?

<a href="register.php">
Daftar Disini
</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
