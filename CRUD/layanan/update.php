<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $nama_pasien = $_POST['nama_pasien'];
    $nama_dokter = $_POST['nama_dokter'];
    $keluhan = $_POST['keluhan'];
    $ruang = $_POST['ruang'];
    $tglmasuk = $_POST['tglmasuk'];
    $tglkeluar = $_POST['tglkeluar'];

    $query = "UPDATE layanan SET nama='$nama', jenis_kelamin='$jenis_kelamin', umur=$umur, keluhan='$keluhan', ruang='$ruang', alamat='$alamat' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
