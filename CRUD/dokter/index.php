<!DOCTYPE html>
<html>
<head>
    <title>CRUD Dokter</title>
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
    <h2>Data Dokter</h2>

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
        <label for="nama">NIP:</label>
        <br>
        <input type="text" name="nip" required>
        <br><br>
        <label for="nama">Nama Dokter:</label>
        <br>
        <input type="text" name="nama" required>
        <br>
        <label for="nama">Spesialis:</label>
        <input type="text" name="spesialis" required>
        <br>
        <input type="submit" value="Simpan">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Spesialis</th>
        </tr>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

        $query = mysqli_query($conn, "SELECT * FROM dokter");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '<tr>';
            echo '<td>' . $row['id_dokter'] . '</td>';
            echo '<td>' . $row['nip'] . '</td>';
            echo '<td>' . $row['nama_dokter'] . '</td>';
            echo '<td>' . $row['spesialis'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id_dokter'] . '">Edit</a> | <a href="delete.php?id=' . $row['id_dokter'] . '">Hapus</a></td>';
            echo '</tr>';
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
