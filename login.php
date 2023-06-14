<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

require 'function.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {

        // Cek Password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // set session
            $_SESSION['login'] = $row['id'];
            header("Location: index.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
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
            <div class="col-md-7">
                <center>
                    <div class="card">
                        <div class="card-body">
                            <img src="img/facebook.png" width="200">
                            <form action="" method="post" class="mb-3">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit">Log in</button>
                            </form>

                            <p>Don't have account? <a href="register.php">register here</a></p>
                        </div>
                    </div>

                </center>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <center>

                            <img src="img/posts.jpg" alt="" width="300">
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/e7d30aebed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>