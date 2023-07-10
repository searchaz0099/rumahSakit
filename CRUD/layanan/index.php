<!DOCTYPE html>
<html>

<head>
    <title>CRUD Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        form {
            margin-bottom: 10px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-msg {
            color: green;
        }

        .error-msg {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Data Layanan</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');
    // Menampilkan pesan sukses atau pesan error
    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') {
            echo '<p class="success-msg">Data berhasil disimpan.</p>';
        } elseif ($_GET['message'] == 'error') {
            echo '<p class="error-msg">Terjadi kesalahan saat menyimpan data.</p>';
        }
    }
    ?>

    <form action="create.php" method="post">
        <label for="nama_pasien">Nama Pasien:</label>
        <?php
        $sql = "select * from pasien";
        $retval = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($retval)) {
            echo "<input name='nama_pasien' type='radio' value='$row[nama_pasien]'>$row[nama_pasien]</input>";
        } ?>
        <br><br>
        <label for="nama_dokter">Nama Dokter:</label>
        <?php
        $sql = "select * from dokter";
        $retval = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($retval)) {
            echo "<input name='nama_dokter' type='radio' value='$row[nama_dokter]'>$row[nama_dokter]</input>";
        } ?>
        <br><br>
        <label for="keluhan">keluhan:</label>
        <?php
        $sql = "select * from pasien";
        $retval = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($retval)) {
            echo "<input name='keluhan' type='radio' value='$row[keluhan]'>$row[keluhan]</input>";
        } ?>
        <br><br>
        <label for="ruang">Ruang:</label>
        <?php
        $sql = "select * from pasien";
        $retval = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($retval)) {
            echo "<input name='ruang' type='radio' value='$row[ruang]'>$row[ruang]</input>";
        } ?>
        <br><br>
        <label for="tglmasuk">Tanggal Masuk:</label>&nbsp;
        <input type="date" name="tglmasuk" required>
        <br><br>
        <label for="tglkeluar">Tanggal Keluar:</label>&nbsp;
        <input type="date" name="tglkeluar" required>
        <br><br>
        <input type="submit" value="Simpan">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pasien</th>
            <th>Nama Dokter</th>
            <th>Keluhan</th>
            <th>Ruang</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Aksi</th>
        </tr>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

        $query = mysqli_query($conn, "SELECT * FROM layanan");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '<tr>';
            echo '<td>' . $row['id_layanan'] . '</td>';
            echo '<td>' . $row['nama_pasien'] . '</td>';
            echo '<td>' . $row['nama_dokter'] . '</td>';
            echo '<td>' . $row['keluhan'] . '</td>';
            echo '<td>' . $row['ruang'] . '</td>';
            echo '<td>' . $row['tanggal_masuk'] . '</td>';
            echo '<td>' . $row['tanggal_keluar'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id_layanan'] . '">Edit</a> | <a href="delete.php?id=' . $row['id_layanan'] . '">Hapus</a></td>';
            echo '</tr>';
        }

        mysqli_close($conn);
        ?>
    </table>
</body>

</html>