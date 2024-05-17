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
    <title>NED Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">NED Food</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container mb-5">
        <h3>Kategori Produk</h3>
        <a href="tambahK.php" class="btn btn-primary mb-3">Tambah Kategori</a>

        <table class="table table-bordered">
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
    <div class="container">
        <h3>Produk</h3>
        <a href="tambah2.php" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-bordered">
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
                <?php $i = 1; ?>
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



</body>

</html>