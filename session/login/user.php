<html>
    <head>
        <title>Daftar Layanan Rumah Sakit</title>
    </head>

    <?php
        $conn = mysqli_connect('localhost','root','','rumahSakit');
    ?>

    <body>
        <center>
            <h3>Daftar User Sakit Permata</h3>
            <hr><br>
            <table border="1" width="70%" style="text-align: center;">
                <tr>
                    <td width="20%">Email</td>
                    <td width="20%">Password</td>
                    <td width="20%">Nama</td>
                    <td width="20%">Status</td>
                </tr>
                <?php
                    $query = "select * from user";
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
                    </tr>
                <?php } ?>
            </table>
        </center>
    </body>
</html>