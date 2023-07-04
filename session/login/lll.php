<html>
    <link rel="stylesheet" href="../css/login.css">
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');
    ?>

    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="lll.php">
                    <input class="input" type="text" placeholder="email" name='email'>
                    <input class="input" type="password" placeholder="passsword" name='password'>
                    <input class="login" type="submit" name="login" placeholder="Login">
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
                <form class="register-form" method="post" action="lll.php">
                    <input class="input" type="text" placeholder="email" name='email'>
                    <input class="input" type="password" placeholder="passsword" name='password'>
                    <input class="input" type="text" placeholder="nama" name='nama'>
                    <input class="input" type="text" placeholder="status" name='status'>
                    <input class="login" type="submit" name="create" placeholder="Create">
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
            </div>
        </div>
    </body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
    
</html>

<?php
    session_start();
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];

    $login = $_POST['login'];
    $create = $_POST['create'];

    $login_query = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $query = mysqli_query($conn, $login_query);
    $row = mysqli_fetch_array($query);
    if($login){
        if($row['email'] != ""){
            $_SESSION['email'] = $row[0];
            $_SESSION['status'] = $row[3];
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