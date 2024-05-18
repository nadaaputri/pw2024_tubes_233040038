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
    // uload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

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

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tdk ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($dataP["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }
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



function cari($keyword)
{
    $query = "SELECT * FROM produk 
                WHERE
            kategori_id LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            detail LIKE '%$keyword%' 

            ";
    return query($query);
}



function registrasi($data)
{
    $conn = koneksiDB();

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah digunakan!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}
