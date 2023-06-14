<?php
require 'function.php';
if (isset($_POST['submit'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                    alert('Daftar Berhasil');
                    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #0080ff;
        }
    </style>
</head>

<body>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <img src="img/facebook.png" width="200">
                            <p>Halaman Registrasi</p>
                        </center>

                        <form action="" method="post" class="mb-3">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password2" name="password2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="submit">Sign Up</button>
                        </form>
                        <p class="text-end"> <a href="login.php" class="card-link">kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e7d30aebed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>