<html>
    <link rel="stylesheet" href="../css/login.css">

    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="index.php">
                    <input class="input" type="text" placeholder="email" name="email">
                    <input class="input" type="password" placeholder="passsword" name="password">
                    <input class="login" type="submit" name="login" placeholder="Login">
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="register-form" method="post" action="index.php">
                    <input class="input" type="text" placeholder="email" name='email'>
                    <input class="input" type="password" placeholder="passsword" name='password'>
                    <input class="input" type="text" placeholder="nama" name='nama'>
                    <input class="login" type="submit" name="create" placeholder="Create">
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
            </div>
        </div>
    </body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
  
</html><?php
    session_start();
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
    $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $_POST['login'];

    if ($login){
        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if ($row['email'] != ""){
            //berhasil login
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = $row['status'];
            if ($row['status']=='Administrator') {
                $_SESSION['status']='Administrator';
                ?>
                <script language script="JavaScript">
                alert('Anda Login Sebagai <?php echo $row['email']; ?>');
                document.location='admin.php';
                </script>
                <?php
            }else {
                ?>
                <script language script="JavaScript">
                alert('Anda Login Sebagai <?php echo $row['username']; ?>');
                document.location='member.php';
                </script>
                <?php
            }
        }else{
            //gagal login
            ?>
            <script languange script = "Javascript">
                alert ("Gagal Login");
                document.location = 'index.php';
            </script>
            <?php
        }
    }
?>

<?php
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
    $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

    $email = $_POST['email'];   
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $create = $_POST['create'];

    

    if($create){

        $sql = "INSERT INTO user VALUES ('$email', '$password', '$nama', 'member')";
        if($email == ""){
            echo '<email tidak boleh kosong';
        }if($password == ""){
            echo 'password tidak boleh kosong';
        }if($nama == ""){
            echo 'nama tidak boleh kosong';
        }elseif($email != ""){
            mysqli_query($conn, $sql);
            echo "
            <script>
                    alert('data berhasil dimasukkan');
                    document.location.href='index.php';
                </script>";
        }
    }

?>