<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $jurusan = $_POST['jurusan'];

    $sql = mysqli_query($koneksi, "INSERT INTO alumni(nama, angkatan, jurusan) 
    VALUES ('$nama', '$angkatan', '$jurusan')");

    header('location: dashboard_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alumni</title>
    <link rel="stylesheet" href="style/tambah.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Alumni</h2>
        <form action="tambah.php" method="post" class="form-box">
            <input type="text" name="nama" placeholder="Masukan Nama" required>
            <input type="number" name="angkatan" placeholder="Masukan Angkatan (contoh: 2026)" required>
            <select name="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                <option value="Teknik Jaringan Akses Telekomunikasi">Teknik Jaringan Akses Telekomunikasi</option>
                <option value="Animasi">Animasi</option>
            </select>
            <div class="buttons">
                <input type="submit" name="tambah" value="Simpan" class="btn-primary">
                <a href="dashboard.php" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>