<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: admin.php");
    exit;
}
require 'functions.php';

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

            header("Location: admin.php");
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
    <style>
        body {
            text-align: center;
            background-color: wheat;
        }

        img {
            width: 250px;
        }

        .input input {
            margin: 4px;
            padding: 5px;
        }

        label {
            display: block;
        }

        .input button {
            background-color: grey;
            margin-top: 5px;
            padding: 5px;
        }
    </style>
</head>

<body>

    <h1>Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username/password salah</p>
    <?php endif; ?>

    <img src="img/logo.png" alt="">
    <form action="" method="post">
        <div class="input">
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="input">
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="input">
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</body>

</html>