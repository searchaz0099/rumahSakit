<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $keluhan = $_POST['keluhan'];
    $ruang = $_POST['ruang'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO pasien (nama_pasien, jenis_kelamin, umur, keluhan, ruang, alamat) VALUES ('$nama', '$jenis_kelamin', 
    '$umur', '$keluhan', '$ruang', '$alamat')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
?>
