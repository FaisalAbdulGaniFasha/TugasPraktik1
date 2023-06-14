<?php

// Koneksi
$conn = mysqli_connect('localhost', 'root', '', 'db_latihan');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $title = htmlspecialchars($data['title']);
    $content = htmlspecialchars($data['content']);
    $idUser = $data['idUser'];
    $create = date("Y-m-d h:i:sa");
    $update = date("Y-m-d h:i:sa");

    $query = "INSERT INTO posts VALUES('',$idUser,'$title','$content','$create','$update')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahComment($data)
{
    global $conn;
    $content = htmlspecialchars($data['comment']);
    $idPost = htmlspecialchars($data['idPost']);
    $idUser = $data['idUser'];
    $create = date("Y-m-d h:i:sa");
    $update = date("Y-m-d h:i:sa");

    $query = "INSERT INTO comments VALUE('',$idPost,$idUser,'$content','$create','$update')";
    mysqli_query($conn, $query);
}
function registrasi($data)
{

    global $conn;
    $username = htmlspecialchars(strtolower($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $email = htmlspecialchars($data['email']);
    $create = date("Y-m-d h:i:sa");
    $update = date("Y-m-d h:i:sa");

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username Sudah Ada');
                </script>";
        return false;
    }


    // cek password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
                </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES('','$username','$email','$password','$create','$update')");

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;
    $id = htmlspecialchars($data['id']);
    $content = htmlspecialchars($data['content']);
    $title = htmlspecialchars($data['title']);
    $create = htmlspecialchars($data['create']);
    $update = date("Y-m-d h:i:sa");

    $query = "UPDATE posts SET content = '$content', title = '$title', create_at = '$create', update_at = '$update' WHERE posts.id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubahComment($data)
{
    global $conn;

    $id  = htmlspecialchars($data['id']);
    $content = htmlspecialchars($data['content']);
    $create = htmlspecialchars($data['create']);

    $query = "UPDATE comments SET content = '$content', created_at = '$create' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
