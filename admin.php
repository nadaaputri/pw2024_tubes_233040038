<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <button type="button" class="btn btn-danger m-4" href="logout.php">Logout</button>
    <h1 class="text-center m-5 text-white">Halaman Admin</h1>
    <div class="row justify-content-center m-4">
        <div class="card w-50 justify-content-center text-bg-light border-secondary">
            <div class="card-body">
                <h5 class="card-title">Kategori</h5>
                <p class="card-text">Klik tombol dibawah ini untuk melihat data kategori.</p>
                <a href="kategori.php" class="btn btn-secondary">view more</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center m-4">
        <div class="card w-50 justify-content-center text-bg-light border-secondary">
            <div class="card-body">
                <h5 class="card-title">Produk</h5>
                <p class="card-text">Klik tombol dibawah ini untuk melihat data produk.</p>
                <a href="produk.php" class="btn btn-secondary">view more</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>