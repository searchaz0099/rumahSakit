<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $query = "DELETE FROM pasien WHERE id_pasien = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
?>
