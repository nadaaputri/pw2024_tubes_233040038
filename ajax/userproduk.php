<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query =  "SELECT * FROM produk 
                WHERE
        kategori_id LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        harga LIKE '%$keyword%' OR
        detail LIKE '%$keyword%' 
        ";
$produk = query($query);

?>

<link rel="stylesheet" href="../css/style.css">
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