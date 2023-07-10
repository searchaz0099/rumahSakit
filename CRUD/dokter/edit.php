<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Dokter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
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
    <h2>Edit Data Dokter</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];

        $query = "UPDATE dokter SET nip='$nip', nama_dokter='$nama', spesialis='$spesialis' WHERE id_dokter=$id";

        if (mysqli_query($conn, $query)) {
            header("Location: index.php?message=success");
            exit();
        } else {
            header("Location: index.php?message=error");
            exit();
        }
    } else {
        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter=$id");
        $row = mysqli_fetch_assoc($query);
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_dokter']; ?>">
        <label for="nip">NIP:</label>
        <br>
        <input type="text" name="nip" value="<?php echo $row['nip']; ?>" required>
        <br><br>
        <label for="nama">Nama Dokter:</label>
        <br>
        <input type="text" name="nama" value="<?php echo $row['nama_dokter']; ?>" required>
        <br><br>
        <label for="spesialis">Spesialis:</label>
        <br>
        <input type="text" name="spesialis" value="<?php echo $row['spesialis']; ?>" required>
        <br><br>
        <input type="submit" value="Simpan">
    </form>

    <a href="index.php">Kembali</a>
</body>
</html>
