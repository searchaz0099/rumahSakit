<html>

<head>
    <title>Ubah Data Layanan</title>
</head>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');
?>
<?php
// error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['update'])) {

    $id_layanan = $_POST['id_layanan'];
    $nama_pasien = $_POST['nama_pasien'];
    $nama_dokter = $_POST['nama_dokter'];
    $keluhan = $_POST['keluhan'];
    $ruang = $_POST['ruang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $result = mysqli_query($conn, "UPDATE layanan set nama_pasien='$nama_pasien', nama_dokter='$nama_dokter' WHERE id_layanan='$id_layanan'");

    header("Location: layanan.php");
}
?>
<?php
$id_layanan = $_GET['id_layanan'];
$result = mysqli_query($conn, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");

while ($data = mysqli_fetch_array($result)) {
    $nama_pasien = $data[1];
    $nama_dokter = $data[2];
}
?>

<body>
    <h3>Masukkan data layanan layanan yang ingin diubah</h3>
    <form action="ubahlayanan.php" method="POST">
        <table border="0" width='30%'>
            <tr>
                <td width='25%'>Kode layanan</td>
                <td width='5%'>:</td>
                <td width='65%'><input type="hidden" name='id_layanan' value="<?php echo $_GET['id_layanan'] ?>"><?php echo $_GET['id_layanan'] ?></td>
            </tr>
            <tr>
                <td width='25%'>Nama layanan</td>
                <td width='5%'>:</td>
                <td width='65%'><input type="text" name='nama_pasien' size="30" value="<?php echo $nama_pasien ?>"></td>
            </tr>
            <tr>
                <td width='25%'>Keterangan layanan layanan</td>
                <td width='5%'>:</td>
                <td width='65%'>
                    <?php
                    $sql = "select * from jenis_layanan";
                    $retval = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "<input name='nama_dokter' type='radio' value='$row[nama_dokter]'>$row[nama_jenis]</input>";
                    }
                    ?></td>
            </tr>
        </table>
        <input type="submit" name="update" id="" value="Update">
    </form>
</body>



</html>