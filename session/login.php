<form method='post' action='login.php'>
    <center class="login-content"><h2>Login</h2>
        <p align='center'>
        username : <input type='text' name='email' class="username"><br>
        password : <input type='password' name='password' class="passworrd"><br>
        <input type='submit' name='submit'>
        </p>
    </center>
</form>
<?php
    session_start();
    error_reporting(E_ALL & E_NOTICE & E_DEPRECATED);
    $conn = mysqli_connect('localhost', 'root', '', 'rumahSakit');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if ($submit){
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
                document.location = 'login.php';
            </script>
            <?php
        }
    }
?>