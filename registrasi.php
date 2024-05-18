<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
    <h1>Halaman Registrasi</h1>
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
            <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2">
        </div>
        <div class="input">
            <button type="submit" name="register">Register!</button>
        </div>
    </form>
</body>

</html>