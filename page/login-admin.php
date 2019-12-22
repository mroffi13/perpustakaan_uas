<?php
session_start();
require '../db/config.php';
if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM admins WHERE nip = '$username'");

    if( mysqli_num_rows($result) === 1 ){

        //set session
        $_SESSION["login-adm"] = mysqli_fetch_assoc($result);
        if( $password == $_SESSION["login-adm"]["password"] ){
            header("Location: http://localhost/perpustakaan_uas/page/buku.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="form-login">
        <br>
        <h2>Form Login</h2>
        <?php if( isset($error) ) : ?>
        <script>
            alert("Username / Password salah");
        </script>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputText">Username</label>
                <input type="text" class="form-control" name="username"id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter Username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark" name="login">Login</button>
        </form>
    </div>
</body>
</html>