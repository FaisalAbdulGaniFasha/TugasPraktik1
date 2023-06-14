<?php

require_once 'function.php';
$id = $_GET["idPost"];



if (hapus($id) > 0) {
    echo "
    <script>
        alert('data  berhasil dihapus');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}

// function hapus(untuk menghapus data)
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM posts WHERE id = $id");

    return mysqli_affected_rows($conn);
}
