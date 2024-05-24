<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$conn = koneksiDB();
// pagination
// konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM produk"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$produk = query("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
$kategori = query("SELECT * FROM kategori");

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
    <title>NED Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Ephesis&family=Lobster&family=Montserrat&family=Pacifico&family=Poppins:wght@100;300;400;700&family=Rubik+Doodle+Shadow&family=Saira+Extra+Condensed:wght@200;400&display=swap" rel="stylesheet" />
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg border-bottom border-body position-fixed top-0 start-0 end-0 z-3 " style="background-color: #a37649; color: #373636;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="NED Foods"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="index.php">Halaman user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Pdf reporting</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off" id="keyword">
                    <button class="btn btn-outline-dark text-white me-3" type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-dark" aria-current="page" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <h1 class="text-center mt-5 produk">Produk NED Food</h1>
    <a href="tambah2.php" class="btn btn-secondary  ms-5">Tambah Produk</a>
    <div id="container">
        <table class="table table-bordered m-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = $awalData + 1; ?>
                <?php foreach ($produk as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $p['kategori_id']; ?></td>
                        <td><img src="img/<?= $p['foto']; ?>" alt="" class="img-fluid" style="width:100px;"></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['harga']; ?></td>
                        <td><?= $p['detail']; ?></td>
                        <td>
                            <a href="ubahP.php?id=<?= $p['id']; ?>" class="badge text-bg-warning text-decoration-none">ubah</a>
                            <a href="hapusP.php?id=<?= $p['id']; ?>" onclick="return confirm('Data akan dihapus?');" class="badge text-bg-danger text-decoration-none">hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- navigasi pagination -->

    <div class="text-center ">
        <?php if ($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1; ?>" class="ms-5">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <a href="?halaman=<?= $i; ?>" style=""><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>" class="text-center text-dark justify-content-center"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;;</a>
        <?php endif; ?>
    </div>
    <!-- Akhhir navigasi pagination -->

    <!-- my javascript -->
    <script src="js/script.js"></script>
</body>

</html>