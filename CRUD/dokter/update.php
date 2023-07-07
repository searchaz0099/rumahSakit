<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $spesialis = $_POST['spesialis'];

    $query = "UPDATE pasien SET
    nip='$nip' nama='$nama', spesialis='$spesialis' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
?>
