<?php
$conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');
?>

<link rel="stylesheet" href="../css/style.css">

<body> 
        <h1 style="text-align: center;">Admin Page</h1>
    <hr>
    <br>
    <center>
        <form>
            <table>
                <tr>
                    <td><button class="login">
                        <a target="_blank" href="../../CRUD/pasien/index.php">Data Pasien</a>
                    </button>
                    <button class="login">
                        <a target="_blank" href="../../CRUD/dokter/index.php">Data Dokter</a>
                    </button>
                    <button class="login">
                        <a target="_blank" href="../../CRUD/layanan/index.php">Data Layanan</a>
                    </button>
                </tr>
            </table>
        </form>
    </center>
    <center>
        <h3>Data User</h3>
            <table border='1' width='70%' style="text-align: center;">
                <tr>
                    <td width='20%'><b>Email</b></td>
                    <td width='20%'><b>Password</b></td>
                    <td width='20%'><b>Nama</b></td>
                    <td width='20%'><b>Status</b></td>
                </tr>
                <?php 
                    $tampil = "SELECT * FROM user WHERE status = 'member' ";
                    $hasil = mysqli_query($conn, $tampil);
                ?>
                <?php 
                    while($data = mysqli_fetch_row($hasil)){
                ?> 
                    <tr>
                        <td><?= $data[0] ?></td>
                        <td><?= $data[1] ?></td>
                        <td><?= $data[2] ?></td>
                        <td><?= $data[3] ?></td>
                    </tr>
                <?php } ?>
            </table>
    </center>
    <!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
</body>
</html>