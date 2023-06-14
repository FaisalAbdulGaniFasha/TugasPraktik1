<?php
session_start();


if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

require 'function.php';
$query = "SELECT posts.id, posts.user_id, posts.title, posts.create_at as waktuPosting, posts.content, users.username FROM posts INNER JOIN users ON (users.id = posts.user_id)";
$data = query($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #D5D6D8;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <i class="fa-brands fa-facebook-f fa-xl " style="color: #ffffff;"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col">


                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <a href="tambah.php" class="btn btn-primary mr-4">Tambah Postingan</a>
                        <span class="text-end">Create and Share Your Story</span>
                    </div>
                </div>

                <!-- Postingan -->
                <?php foreach ($data as $d) : ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d['username']; ?></h5>
                            <h6 class="card-subtitle mb-3 text-body-secondary"><?= $d['waktuPosting']; ?></h6>
                            <h3 class="card-title"><?= $d['title']; ?></h3>
                            <p class="card-text"><?= $d['content']; ?></p>
                            <a href="detail.php?idPost=<?= $d['id']; ?>">Detail</a>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e7d30aebed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>