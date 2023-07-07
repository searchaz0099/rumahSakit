<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

    $id_pasien = $_POST['id_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $nama_dokter = $_POST['nama_dokter'];
    $keluhan = $_POST['keluhan'];
    $ruang = $_POST['ruang'];
    $tglmasuk = $_POST['tglmasuk'];
    $tglkeluar = $_POST['tglkeluar'];

    $query = "SELECT keluhan, ruang FROM pasien WHERE nama_pasien = '$nama_pasien'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $keluhan = $row['keluhan'];
    $ruang = $row['ruang'];

    $query = "INSERT INTO layanan VALUES ('$id_pasien' ,'$nama_pasien', '$nama_dokter','$keluhan', '$ruang', '$tglmasuk', '$tglkeluar')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
