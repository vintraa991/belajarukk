<?php
session_start();
include 'koneksi.php';

if(isset($_GET['id_alumni'])){
    $id_alumni = $_GET['id_alumni'];
    
    $sql = mysqli_query($koneksi, "SELECT * FROM alumni WHERE id_alumni = $id_alumni");
    $data = mysqli_fetch_assoc($sql);
}

if(isset($_POST['edit'])){
    $id_alumni = $_POST['id_alumni'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($koneksi, "UPDATE alumni SET nama='$nama', angkatan='$angkatan', jurusan='$jurusan' WHERE id_alumni='$id_alumni'");
    header('location: dashboard_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni</title>
    <link rel="stylesheet" href="style/edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Alumni</h2>
        <form action="edit.php" method="post" class="form-box">
            <input type="hidden" name="id_alumni" value="<?= $data['id_alumni'] ?>">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama" required>
            <input type="number" name="angkatan" value="<?= $data['angkatan'] ?>" placeholder="Masukkan Angkatan" required>
            <select name="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="Rekayasa Perangkat Lunak" <?= $data['jurusan'] == 'Rekayasa Perangkat Lunak' ? 'selected' : '' ?>>Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer dan Jaringan" <?= $data['jurusan'] == 'Teknik Komputer dan Jaringan' ? 'selected' : '' ?>>Teknik Komputer dan Jaringan</option>
                <option value="Teknik Jaringan Akses Telekomunikasi" <?= $data['jurusan'] == 'Teknik Jaringan Akses Telekomunikasi' ? 'selected' : '' ?>>Teknik Jaringan Akses Telekomunikasi</option>
                <option value="Animasi" <?= $data['jurusan'] == 'Animasi' ? 'selected' : '' ?>>Animasi</option>
            </select>
            <div class="buttons">
                <input type="submit" name="edit" value="Simpan Perubahan" class="btn-primary">
                <a href="dashboard.php" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>