<?php
require 'functions.php';

$produk = query("SELECT * FROM produk WHERE kategori_id=1");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NED Foods</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Ephesis&family=Lobster&family=Montserrat&family=Pacifico&family=Poppins:wght@100;300;400;700&family=Rubik+Doodle+Shadow&family=Saira+Extra+Condensed:wght@200;400&display=swap" rel="stylesheet" />
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg border-bottom border-body position-fixed top-0 start-0 end-0 z-3 " style="background-color: #a37649; color: #373636;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="NED Foods"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="index.php">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off" id="keyword">
                    <button class="btn btn-outline-dark text-white" type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Produk -->
    <section id="produk" class=" pt-5">
        <div class="container" id="container">
            <div class="row produk">
                <div class="col">
                    <h1 class="mb-5 text-center">Kategori <span> Makanan</span></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($produk as $p) : ?>
                    <div class="col mb-5">
                        <div class="card bg-transparent border-dark" style="width: 18rem; height:35rem;">
                            <img src="img/<?= $p['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">~<?= $p['nama']; ?>~</h4>
                                <p class="card-text"><?= $p['harga']; ?></p>
                                <p><?= $p['detail']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Akhir Produk -->

    <!-- My js -->
    <script src="js/script3.js"></script>

</body>