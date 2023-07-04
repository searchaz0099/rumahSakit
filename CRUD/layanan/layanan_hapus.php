<?php
$conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

$id_layanan = $_GET['id_layanan'];
$result = mysqli_query($conn, "DELETE FROM buku WHERE id_layanan='$id_layanan'");

header("location:../../session/layanan.php");
