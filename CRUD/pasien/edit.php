<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        textarea {
            height: 80px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 16px;
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

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Pasien</h2>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $umur = $_POST['umur'];
            $keluhan = $_POST['keluhan'];
            $ruang = $_POST['ruang'];
            $alamat = $_POST['alamat'];

            $query = "UPDATE pasien SET nama='$nama', jenis_kelamin='$jenis_kelamin', umur='$umur', keluhan='$keluhan', ruang='$ruang', alamat='$alamat' WHERE id=$id";

            if (mysqli_query($conn, $query)) {
                header("Location: index.php?message=success");
                exit();
            } else {
                header("Location: index.php?message=error");
                exit();
            }
        } else {
            $id = $_GET['id'];

            $query = mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien=$id");
            $row = mysqli_fetch_assoc($query);
        }
        ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama">Nama Pasien:</label>
            <br>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
            <br>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <br>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
            <br>
            <label for="umur">Umur:</label>
            <br>
            <input type="number" name="umur" min="0" value="<?php echo $row['umur']; ?>" required>
            <br>
            <label for="keluhan">Keluhan:</label>
            <br>
            <textarea name="keluhan" rows="4" required><?php echo $row['keluhan']; ?></textarea>
            <br>
            <label for="ruang">Ruang:</label>
            <br>
            <input type="text" name="ruang" value="<?php echo $row['ruang']; ?>" required>
            <br>
            <label for="alamat">Alamat:</label>
            <br>
            <textarea name="alamat" rows="4" required><?php echo $row['alamat']; ?></textarea>
            <br>
            <input type="submit" value="Simpan">
        </form>

        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
