<html>
    <head>
        <title>Daftar Layanan Rumah Sakit</title>
    </head>

    <?php
        $conn = mysqli_connect('localhost','root','','rumahSakit');
    ?>

    <body>
        <center>
            <h3>Daftar Status Layanan Rumah Sakit Permata</h3>
            <hr><br>
            <table border="1" width="70%" style="text-align: center;">
                <tr>
                    <td width="20%">Id</td>
                    <td width="20%">Nama Pasien</td>
                    <td width="20%">Nama Dokter</td>
                    <td width="20%">Keluhan</td>
                    <td width="20%">Ruang</td>
                    <td width="20%">Tanggal Masuk</td>
                    <td width="20%">Tanggal Keluar</td>
                </tr>
                <?php
                    $query = "select * from layanan";
                    $hasil = mysqli_query($conn, $query);
                ?>
                <?php
                    while($data = mysqli_fetch_row($hasil)){
                ?>
                    <tr>
                        <td><?= $data[0] ?></td>
                        <td><?= $data[1] ?></td>
                        <td><?= $data[2] ?></td>
                        <td><?= $data[3] ?></td>
                        <td><?= $data[4] ?></td>
                        <td><?= $data[5] ?></td>
                        <td><?= $data[6] ?></td>
                    </tr>
                    <td>
                        <a href=#>Ubah Data</a> |
                        <a href=#>Hapus Data</a>
                    </td>
                <?php } ?>
            </table>
        </center>
    </body>
</html>