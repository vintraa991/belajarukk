<?php

header("Location: login.php");
exit;

session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $row = mysqli_query($koneksi, $query);

    if($row->num_rows > 0){
        $data = mysqli_fetch_assoc($row);

        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        header('location: dashboard.php');
    }else{
        echo "username dan password salah";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Alumni</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="post" class="login-form">
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <input type="submit" name="login" value="Masuk">
        </form>
    </div>
</body>
</html>
