<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Layanan Pasien</title>
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
    <h2>Edit Data Layanan Pasien</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $nama_pasien = $_POST['nama_pasien'];
        $nama_dokter = $_POST['nama_dokter'];
        $keluhan = $_POST['keluhan'];
        $ruang = $_POST['ruang'];
        $tglmasuk = $_POST['tglmasuk'];
        $tglkeluar = $_POST['tglkeluar'];

        $query = "UPDATE layanan SET nama_pasien='$nama_pasien', nama_dokter='$nama_dokter', keluhan='$keluhan', 
        ruang='$ruang', tanggal_masuk='$tglmasuk', tanggal_keluar='$tglkeluar' WHERE id_layanan='$id'";

        if (mysqli_query($conn, $query)) {
            header("Location: index.php?message=success");
            exit();
        } else {
            header("Location: index.php?message=error");
            exit();
        }
    } else {
        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM layanan WHERE id_layanan=$id");
        $row = mysqli_fetch_assoc($query);
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_layanan']; ?>">
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
        <input type="date" name="tglmasuk" value="<?php echo $row['tanggal_masuk']; ?>" required>
        <br><br>
        <label for="tglkeluar">Tanggal Keluar:</label>&nbsp;
        <input type="date" name="tglkeluar" value="<?php echo $row['tanggal_keluar']; ?>" required>
        <br><br>
        <input type="submit" value="Simpan">
    </form>

    <a href="index.php">Kembali</a>
</body>

</html>