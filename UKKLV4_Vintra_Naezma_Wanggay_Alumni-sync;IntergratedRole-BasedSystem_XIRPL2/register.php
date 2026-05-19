<?php
include 'koneksi.php';

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $jurusan = $_POST['jurusan'];
    $role = $_POST['role'];

    // Password tidak di-escape karena langsung di-hash
    // ⚠️ Tambah validasi panjang password sebelum di-hash
    $pass = $_POST['password'];

    // Validasi minimal password
    if(strlen($pass) < 6){
        echo "<script>alert('Password minimal 6 karakter!');</script>";
    } else {

        // Hash password menggunakan bcrypt sebelum disimpan ke database
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

        // simpan ke users
        mysqli_query($koneksi, "
            INSERT INTO users(username, password, role)
            VALUES ('$username', '$hashed_pass', '$role')
        ");

        // kalau bukan admin → masuk alumni
        if($role == 'user'){
            mysqli_query($koneksi, "
                INSERT INTO alumni(nama, angkatan, jurusan)
                VALUES ('$nama', '$angkatan', '$jurusan')
            ");
        }

        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>

<div class="register-container">
    <h2>Buat Akun</h2>

    <form method="POST" class="register-form">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="text" name="nama" placeholder="Nama Lengkap" required>

        <input type="number" name="angkatan" placeholder="Angkatan" required>

        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
            <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
            <option value="Animasi">Animasi</option>
        </select>

        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button name="register">Daftar</button>
    </form>

    <a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>