<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ambil user berdasarkan username
    $query = mysqli_query($koneksi,
        "SELECT * FROM users WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    // cek user ada atau tidak
    if($data){

        // cek password hash
        if(password_verify($password, $data['password'])){

            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            // redirect berdasarkan role
            if($data['role'] == 'admin'){
                header("Location: dashboard_admin.php");
            } else {
                header("Location: dashboard_user.php");
            }

            exit;

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Data Alumni</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>

<div class="login-container">

    <div class="logo-box">
        <img src="src/logo.png" alt="Logo Sekolah">
    </div>

    <h2>Manajemen Data Alumni</h2>

    <?php
    if(isset($error)){
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="POST" class="login-form">

        <input type="text"
               name="username"
               placeholder="Username"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

    <p>
        Belum punya akun?
        <a href="register.php">Daftar</a>
    </p>

</div>

</body>
</html>