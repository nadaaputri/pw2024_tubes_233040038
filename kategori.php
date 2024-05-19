<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$kategori = query("SELECT * FROM kategori");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NED Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark-subtle">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- Navbar -->
    <nav class="navbar mb-4 navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary text-white" type="submit" name="cari">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <h1 class="text-center">Kategori Produk</h1>
    <a href="tambahK.php" class="btn btn-secondary m-3 mb-2">Tambah Kategori</a>

    <table class="table table-bordered m-4 me-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Detail</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kategori as $ktg) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $ktg['nama']; ?></td>
                    <td><?= $ktg['detail']; ?></td>
                    <td>
                        <a href="ubahK.php?id=<?= $ktg['id']; ?>" class="badge text-bg-warning text-decoration-none">ubah</a>
                        <a href="hapusK.php?id=<?= $ktg['id']; ?>" onclick="return confirm('Data akan dihapus?');" class="badge text-bg-danger text-decoration-none">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

</body>

</html>