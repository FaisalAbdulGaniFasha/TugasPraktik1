<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "function.php";

$id = $_GET['idCom'];
$data = query("SELECT content, created_at FROM comments WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahComment($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href = 'index.php';
    </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Postingan</title>
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

    <div class="container mt-3">
        <div class="row">
            <div class="col">

                <form action="" method="post">
                    <input type="hidden" name="create" value="<?= $data['created_at'] ?>">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="mb-3">
                        <label for="content" class="form-label">Comments</label>
                        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Insert Content" name="content"><?= $data['content']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-4" name="submit">Ubah</button>
                    <p class="text-end"> <a href="index.php" class="card-link">Kembali</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e7d30aebed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</body>

</html>