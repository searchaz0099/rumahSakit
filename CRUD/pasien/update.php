<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $keluhan = $_POST['keluhan'];
    $ruang = $_POST['ruang'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE pasien SET nama='$nama', jenis_kelamin='$jenis_kelamin', umur=$umur, keluhan='$keluhan', ruang='$ruang', alamat='$alamat' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php?message=success');
    } else {
        header('Location: index.php?message=error');
    }

    mysqli_close($conn);
}
?>
