<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php'
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
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Ephesis&family=Lobster&family=Montserrat&family=Pacifico&family=Poppins:wght@100;300;400;700&family=Rubik+Doodle+Shadow&family=Saira+Extra+Condensed:wght@200;400&display=swap" rel="stylesheet" />
    <style>
        body {
            text-align: center;
            background-color: wheat;
        }

        img {
            width: 250px;
        }

        h1 {
            font-family: "Poppins", sans-serif;

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
    <h1 class="m-5">Registrasi account</h1>
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
            <button type="submit" name="register" class="btn btn-secondary mb-4">Register!</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>