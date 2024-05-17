<?php
function koneksiDB()
{
    $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040038');
    return $db;
}

function query($sql)
{
    $conn = koneksiDB();

    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}



function tambahK($dataK)
{
    $conn = koneksiDB();

    $nama = htmlspecialchars($dataK["nama"]);
    $detail = htmlspecialchars($dataK["detail"]);

    $query = "INSERT INTO kategori
                VALUES
                (NULL, '$nama', '$detail')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahP($dataP)
{
    $conn = koneksiDB();

    $kategori_id = htmlspecialchars($dataP["kategori_id"]);
    $foto = htmlspecialchars($dataP["foto"]);
    $nama = htmlspecialchars($dataP["nama"]);
    $harga = htmlspecialchars($dataP["harga"]);
    $detail = htmlspecialchars($dataP["detail"]);

    $query = "INSERT INTO produk
                VALUES
                (NULL, '$kategori_id', '$foto', '$nama', '$harga', '$detail')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function hapusK($id)
{
    $conn = koneksiDB();
    mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapusP($id)
{
    $conn = koneksiDB();
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($conn);
}



function ubahK($dataK)
{
    $conn = koneksiDB();

    $id = $dataK["id"];
    $nama = htmlspecialchars($dataK["nama"]);
    $detail = htmlspecialchars($dataK["detail"]);

    $query = "UPDATE kategori SET
                nama = '$nama',
                detail = '$detail'
                WHERE id = $id;
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahP($dataP)
{
    $conn = koneksiDB();

    $id = $dataP["id"];
    $kategori_id = htmlspecialchars($dataP["kategori_id"]);
    $foto = htmlspecialchars($dataP["foto"]);
    $nama = htmlspecialchars($dataP["nama"]);
    $harga = htmlspecialchars($dataP["harga"]);
    $detail = htmlspecialchars($dataP["detail"]);

    $query = "UPDATE produk SET
                kategori_id = '$kategori_id',
                foto = '$foto',
                nama = '$nama',
                harga = '$harga',
                detail = '$detail'
                WHERE id = $id;
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
