<html>
    <link rel="stylesheet" href="../css/login.css">

    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="lll.php">
                    <input class="input" type="text" placeholder="email" name='email'>
                    <input class="input" type="password" placeholder="passsword" name='password'>
                    <input class="login" type="submit" name="login" placeholder="Login">
                </form>
                <!-- <form class="register-form" method="post" action=".php">
                    <input class="input" type="text" placeholder="email" name='email'>
                    <input class="input" type="password" placeholder="passsword" name='password'>
                    <input class="input" type="text" placeholder="nama" name='nama'>
                    <input class="create" type="submit" name="create" placeholder="Create">
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form> -->
            </div>
        </div>
    </body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
    
</html>

<?php
    session_start();
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
    $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];

    $login = $_POST['login'];
    $create = $_POST['create'];

    $login_query = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $create_query = "INSERT INTO USER (email, passsword, nama, status) VALUES ('$email', '$password', '$nama','member')";
    $query_login = mysqli_query($conn, $login_query);
    $query_create = mysqli_query($conn, $create_query);
    $row_ = mysqli_fetch_array($query_login);
    if($login){
        if($row['email'] != ""){
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = $row['status'];
            if($row['status'] == 'Administrator');
            ?>
            <script language script="JavaScript">
                alert('Anda Login Sebagai <?php echo $row['email']; ?>');
                document.location='../admin.php';
                </script>
            <?php
        }else{
            ?>
            <script language script="JavaScript">
                alert('Anda login sebagai <?php echo $row['email']; ?>');
                document.location = '../member.php';
            </script>
            <?php
        }
    }
?>