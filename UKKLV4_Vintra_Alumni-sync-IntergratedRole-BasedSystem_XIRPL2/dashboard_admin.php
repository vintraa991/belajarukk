<?php
session_start();
include 'koneksi.php';

// 🔒 PROTEKSI (WAJIB LOGIN & ROLE ADMIN)
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}

// 🔒 CEGAH CACHE
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$sql = mysqli_query($koneksi, "
SELECT * FROM alumni 
WHERE nama LIKE '%$cari%' 
OR angkatan LIKE '%$cari%' 
OR jurusan LIKE '%$cari%'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>

<header class="navbar">
    <h1>Dashboard Admin <br>
    <small>Login sebagai: <?= $_SESSION['username']; ?></small>
    </h1>

    <a href="logout.php" class="logout-btn">Logout</a>
</header>

<main class="content">

    <div class="table-header">
        <h2>Daftar Alumni</h2>
        <a href="tambah.php" class="add-btn">+ Tambah Data</a>
    </div>

    <!-- 🔍 SEARCH -->
    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Cari nama / angkatan / jurusan" value="<?= $cari ?>">
        <button type="submit">Cari</button>
    </form>

    <table class="alumni-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;

        if(mysqli_num_rows($sql) == 0){
            echo "<tr><td colspan='5' class='empty'>Data tidak ditemukan</td></tr>";
        }

        while($data = mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['angkatan'] ?></td>
                <td><?= $data['jurusan'] ?></td>
                <td class="actions">
                    <a href="edit.php?id_alumni=<?= $data['id_alumni'] ?>" class="edit-btn">Edit</a>
                    <a href="delete.php?id_alumni=<?= $data['id_alumni'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</main>

</body>
</html>