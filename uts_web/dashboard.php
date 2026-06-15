<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">
            Sistem Akademik
        </span>

        <span class="text-white">
            <?php echo $_SESSION['username']; ?>
            (<?php echo $_SESSION['status']; ?>)
        </span>
    </div>
</nav>

<div class="container mt-4">

    <div class="alert alert-success">
        <h4>Selamat Datang, <?php echo $_SESSION['username']; ?></h4>
        <p>Anda berhasil login sebagai <?php echo $_SESSION['status']; ?></p>
    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h3>👨‍🎓</h3>

                    <h5>Data Mahasiswa</h5>

                    <a href="mahasiswa/index.php"
                    class="btn btn-primary">
                        Kelola Data
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h3>📚</h3>

                    <h5>Data Mata Kuliah</h5>

                    <a href="matakuliah/index.php"
                    class="btn btn-success">
                        Kelola Data
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h3>🚪</h3>

                    <h5>Logout Sistem</h5>

                    <a href="logout.php"
                    class="btn btn-danger">
                        Logout
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>