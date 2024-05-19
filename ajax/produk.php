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