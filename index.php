<?php
require 'functions.php';

$kategori = query("SELECT * FROM kategori");
$produk = query("SELECT * FROM produk");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}

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
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="NED Foods"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#kategori">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#contact">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off" id="keyword">
                    <button class="btn btn-outline-dark text-white" type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login.php">Login admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hero Section -->
    <section class="hero" id="home">
        <main class="content mb-5 ">
            <h1>NED <span>food</span></h1>
            <p>Enak di mulut, Enteng di dompet</p>
            <a href="#" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- Akhir Hero -->

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row text-center m-4">
                <div class="col">
                    <h1><span>Tentang</span> Kami</h1>
                </div>
            </div>
            <div class="row text-center fs-5 justify-content-center">
                <div class="col-md-4 m-5">
                    <img src="img/kopi2.jpg" class="img-fluid ">
                </div>
                <div class="col-md-4 m-5">
                    <p>NED Food menyediakan berbagai makanan dan minuman kekinian yang dijamin memiliki keunggulan tersendiri karena terbuat dari bahan-bahan premium, tetapi harga tetap terjangkau dan disukai oleh semua orang.

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir about -->

    <!-- Kategori -->
    <section id="kategori" class="text-center">
        <div class="container py-5">
            <div class="row fs-5 kategori">
                <div class="col text-center">
                    <h1 class=""><span>Kategori</span> Produk</h1>
                    <p class="kategori col-6 ">NED food tidak hanya menyediakan berbagai macam makanan, tetapi tersedia juga minuman dengan harga yang terjangkau.</p>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col m-5">
                    <div class="card  " style="width: 18rem; height: 18rem; background-color:rgb(236, 197, 129);">
                        <div class="card-body">
                            <h4 class="card-title">Makanan</h4>
                            <p class="card-text m-3">Tersedia berbagai macam makanan yang dibuat menggunakan bahan-bahan premium dengan harga yang terjangkau.</p>
                            <a href="#" class="btn btn-outline-dark mb-3">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col m-5">
                    <div class="card " style="width: 18rem; height: 18rem; background-color: rgb(236, 197, 129);">
                        <div class="card-body m-3">
                            <h4 class="card-title">Minuman</h4>
                            <p class="card-text m-3">Tersedia minuman segar dengan harga yang terjangkau.</p>
                            <a href="#" class="btn btn-outline-dark">Lihat selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Kategori -->

    <!-- Produk -->
    <section id="produk" class=" pt-5">
        <div class="container" id="container">
            <div class="row produk">
                <div class="col">
                    <h1 class="mb-5 text-center">Pro<span>duk</span></h1>
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

    <!-- contact -->
    <section id="contact" class="text-center contact">
        <div class="container py-5">
            <h1 class="">Con<span>tact</span></h1>
            <div class="row fs-5 justify-content-center">
                <div class="col-6">
                    <p class="text-center mb-4">Untuk pemesanan produk dan info lebih lanjut dapat menghubungi kontak dibawah ini.</p>
                    <a href="https://wa.me/qr/BG7QSJ5ZPXLAD1" class="mb-5"><i class=" bi bi-whatsapp"></i> 0895351475238</a>
                    <p>Sosial media lainnya:</p>
                    <a href="https://www.instagram.com/roti_kd_anekarasa/"><i class="bi bi-instagram"></i> @roti_kd_anekarasa</a><br>
                    <a href="https://youtube.com/@ned_tv?si=Gx6-uylJbWvHJkpz"><i class="bi bi-youtube"></i> @Ned_Tv</a>
                </div>
            </div>

        </div>
    </section>
    <!-- Akhir contact -->

    <!-- Footer -->
    <footer>
        <div class="social">
            <a href="https://wa.me/qr/BG7QSJ5ZPXLAD1"><i class=" bi bi-whatsapp"></i></a>
            <a href="https://www.instagram.com/roti_kd_anekarasa/"><i class="bi bi-instagram"></i></a>
            <a href="https://youtube.com/@ned_tv?si=Gx6-uylJbWvHJkpz"><i class="bi bi-youtube"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#kategori">Kategori</a>
            <a href="#produk">Produk</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="credit">
            <p>Created by <a href="https://www.instagram.com/nadaaptri_/">NadaaPutri</a>. | &copy; 2024.</p>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- my javascript -->
    <script src="js/script2.js"></script>

</body>

</html>