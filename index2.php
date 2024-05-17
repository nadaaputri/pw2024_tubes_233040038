<?php
require 'functions.php';

$kategori = query("SELECT * FROM kategori");
$produk = query("SELECT * FROM produk");

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

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="NED Foods"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn1" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hero Section -->
    <section class="hero" id="home">
        <main class="content">
            <h1>NED <span>food</span></h1>
            <p>Enak di mulut, Enteng di dompet</p>
            <a href="#menu" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- Akhir Hero -->

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row text-center text-white m-4">
                <div class="col">
                    <h1>Tentang Kami</h1>
                </div>
            </div>
            <div class="row text-center fs-5 justify-content-center">
                <div class="col-md-4 m-5">
                    <img src="img/kopi2.jpg" class="img-fluid ">
                </div>
                <div class="col-md-4 m-5 text-white">
                    <p>NED Food menyediakan berbagai makanan dan minuman kekinian yang dijamin memiliki keunggulan tersendiri karena terbuat dari bahan-bahan premium, tetapi harga tetap terjangkau dan disukai oleh semua orang.

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir about -->

    <!-- Kategori -->
    <section id="kategori" class="text-center pb-5">
        <div class="container py-5">
            <div class="row fs-5 text-white">
                <div class="col justify-content-center text-center pb-5">
                    <h1 class="mb-4">Kategori Produk</h1>
                    <p class="kategori ">NED food tidak hanya menyediakan berbagai macam makanan, tetapi tersedia juga minuman dengan harga yang terjangkau.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($kategori as $ktg) : ?>
                    <div class="col m-5">
                        <div class="card" style="width: 18rem; height: 12rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $ktg['nama']; ?></h5>
                                <p class="card-text"><?= $ktg['detail']; ?></p>
                                <a href="#" class="btn btn-secondary">Lihat selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Akhir Kategori -->

    <!-- Produk -->
    <section id="produk" class=" pb-5">
        <div class="container">
            <div class="row text-white">
                <div class="col">
                    <h1 class="mb-5 text-center">Produk</h1>
                    <a href="tambah.php" class=" mb-3 btn btn-primary">Tambah Data Menu</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($produk as $p) : ?>
                    <div class="col mb-5">
                        <div class="card" style="width: 18rem; height:42rem;">
                            <img src="img/<?= $p['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title"><?= $p['nama']; ?></h4>
                                <p class="card-text"><?= $p['harga']; ?></p>
                                <p><?= $p['detail']; ?></p>
                            </div>
                            <div class="card-body">
                                <a href="#" class="badge text-bg-warning text-decoration-none">ubah</a>
                                <a href="#" class="badge text-bg-danger text-decoration-none">hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Akhir Produk -->
</body>

</html>