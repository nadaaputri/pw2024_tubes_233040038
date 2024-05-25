<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$produk = query("SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NED Food</title>
</head>
<body>
    <h1 class="text-center mt-5 produk" style="font-weight:600;">Produk NED Food</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Detail</th>

            </tr>
        </thead>';

$i = 1;
foreach ($produk as $p) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $p["nama_kategori"] . '</td>
                <td><img src="img/' . $p["foto"] . '" width="100px"></td>
                <td>' . $p["nama"] . '</td>
                <td>' . $p["harga"] . '</td>
                <td>' . $p["detail"] . '</td>
            </tr>';
}

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('data-produk-ned-food.pdf', \Mpdf\Output\Destination::INLINE);
