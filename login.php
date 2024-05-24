<?php
require 'functions.php';

session_start();

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    $conn = koneksiDB();

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: produk.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $conn = koneksiDB();

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //    cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: produk.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;
            background-color: wheat;
        }

        img {
            width: 250px;
        }

        h1 {
            font-family: "Poetsen One", sans-serif;
        }

        .input input {
            margin: 4px;
            padding: 5px;
        }

        .label {
            display: block;
        }

        .input button {
            background-color: grey;
            margin-top: 5px;
            padding: 8px;
        }
    </style>
</head>

<body>

    <h1 class="m-5">Login admin</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username/password salah</p>
    <?php endif; ?>

    <img src="img/logo.png" alt="">
    <form action="" method="post">
        <div class="input">
            <label for="username" class="label">Username :</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="input">
            <label for="password" class="label">Password :</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="input">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" id="remember">
        </div>
        <div class="input">
            <button type="submit" name="login" class="btn btn-secondary mb-4">Login</button>
        </div>
    </form>
    <p>Don't have an account? <a href="registrasi.php">Sign up</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>