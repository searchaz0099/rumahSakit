<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pasien</title>
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

        table th, table td {
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
    <h2>Data Pasien</h2>

    <?php
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
        <label for="nama">Nama Pasien:</label>
        <br>
        <input type="text" name="nama" required>
        <br><br>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <br>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <br><br>
        <label for="umur">Umur:</label>
        <br>
        <input type="number" name="umur" min="0" required>
        <br><br>
        <label for="keluhan">Keluhan:</label>
        <br>
        <textarea name="keluhan" rows="4" required></textarea>
        <br><br>
        <label for="ruang">Ruang:</label>
        <br>
        <input type="text" name="ruang" required>
        <br><br>
        <label for="alamat">Alamat:</label>
        <br>
        <textarea name="alamat" rows="4" required></textarea>
        <br><br>
        <input type="submit" value="Simpan">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Keluhan</th>
            <th>Ruang</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

        $query = mysqli_query($conn, "SELECT * FROM pasien");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '<tr>';
            echo '<td>' . $row['id_pasien'] . '</td>';
            echo '<td>' . $row['nama_pasien'] . '</td>';
            echo '<td>' . $row['jenis_kelamin'] . '</td>';
            echo '<td>' . $row['umur'] . '</td>';
            echo '<td>' . $row['keluhan'] . '</td>';
            echo '<td>' . $row['ruang'] . '</td>';
            echo '<td>' . $row['alamat'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id_pasien'] . '">Edit</a> | <a href="delete.php?id=' . $row['id_pasien'] . '">Hapus</a></td>';
            echo '</tr>';
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
