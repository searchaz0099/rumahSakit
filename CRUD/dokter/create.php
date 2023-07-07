<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $spesialis = $_POST['spesialis'];

    $query = "INSERT INTO dokter (nip, nama_dokter, spesialis) VALUES ('$nip', '$nama', '$spesialis')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
?>
