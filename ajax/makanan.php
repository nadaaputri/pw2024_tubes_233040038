<?php
require '../functions.php';
$keyword = $_GET["keyword"];


$query =  "SELECT * FROM produk 
                WHERE
        nama LIKE '%$keyword%' OR
        harga LIKE '%$keyword%' OR
        detail LIKE '%$keyword%' AND 
        kategori_id=1
        ";
$produk = query($query);
// var_dump($produk);

?>

<!-- Produk -->
<!-- <section id="produk" class=" pt-5"> -->

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

<!-- </section> -->
<!-- Akhir Produk -->