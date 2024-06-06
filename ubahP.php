<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$kategori = query("SELECT * FROM kategori");

// ambil data di url
$id = $_GET["id"];

// query data berdasarkan id
$p = query("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah
    if (ubahP($_POST) > 0) {
        echo "
            <script>
                alert('Data produk berhasil diubah');
                document.location.href = 'produk.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data produk gagal diubah');
                document.location.href = 'produk.php';
            </script>
        ";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container  col-8">
        <h1>Ubah Data Produk</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $p["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $p["foto"]; ?>">
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Pilih Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label><br>
                <img src="img/<?= $p['foto']; ?>" width="50"><br>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $p["nama"]; ?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required value="<?= $p["harga"]; ?>">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <input type="text" class="form-control" id="detail" name="detail" required value="<?= $p["detail"]; ?>">
            </div>

            <button type=" submit" class="btn btn-primary mb-5" name="submit">Ubah</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>