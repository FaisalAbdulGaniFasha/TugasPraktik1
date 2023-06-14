<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'function.php';

$id = $_GET['idPost'];

$comment = query("SELECT users.id as idUser, comments.id as idCom, users.username, comments.content as comm, comments.created_at as waktu FROM comments inner join posts on (posts.id = comments.post_id) inner join users on (comments.user_id = users.id) WHERE post_id = $id;");
$post = query("SELECT title, content, users.id as idUser, posts.create_at as waktu, username FROM `posts`inner join users on (posts.user_id = users.id) WHERE posts.id = $id;")[0];

if (isset($_POST['submit'])) {
    tambahComment($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Detail</title>
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
                                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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

    <!-- detail Content -->
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Details Posts
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <div class="card-body mb-4">
                        <h5 class="card-title"><?= $post['username']; ?></h5>
                        <h6 class="card-subtitle mb-3 text-body-secondary"><?= $post['waktu']; ?></h6>
                        <h3 class="card-title"><?= $post['title']; ?></h3>
                        <p class="card-text"><?= $post['content']; ?></p>
                    </div>
                    <div class="card-footer text-body-secondary">

                        <form action="" method="post">
                            <input type="hidden" name="idUser" value="<?= $_SESSION['login']; ?>">
                            <input type="hidden" name="idPost" value="<?= $id; ?>">
                            <!-- EDIT -->
                            <?php if ($_SESSION['login'] == $post['idUser']) : ?>
                                <a class="mr-3 my-2" href="edit.php?idPost=<?= $id; ?>">Edit</a> |
                                <a href="hapus.php?idPost=<?= $id; ?>">Hapus</a> |
                            <?php endif; ?>

                            <label for="comment">Comments <i class="fa-regular fa-comment"></i></label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Insert Comments" name="comment"></textarea>
                            <button type="submit" class="btn btn-secondary mt-2" name="submit">Kirim</button>
                        </form>
                    </div>
                </div>

                <p class="mt-3">Comments <i class="fa-solid fa-comments"></i></p>

                <?php foreach ($comment as $c) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $c['username']; ?></h5>
                            <h6 class="card-subtitle mb-3 text-body-secondary"><?= $c['waktu']; ?></h6>
                            <p class="card-text"><?= $c['comm']; ?></p>
                            <!-- Edit Comments -->
                            <?php if ($_SESSION['login'] == $c['idUser']) : ?>
                                <a href="hapusComment.php?idCom=<?= $c['idCom']; ?>" class="btn btn-danger">Hapus</a>
                                <a href="editComment.php?idCom=<?= $c['idCom']; ?>" class="btn btn-success">Edit</a>
                            <?php endif; ?>

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