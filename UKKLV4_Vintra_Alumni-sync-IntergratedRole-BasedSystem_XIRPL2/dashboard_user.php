<?php
session_start();
include 'koneksi.php';

// 🔒 PROTEKSI (WAJIB LOGIN & ROLE USER)
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}

// 🔒 CEGAH CACHE (biar logout tidak bisa back)
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
    <title>Dashboard User</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>

<header class="navbar">
    <h1>Dashboard User <br>
    <small>Login sebagai: <?= $_SESSION['username']; ?></small>
    </h1>

    <a href="logout.php" class="logout-btn">Logout</a>
</header>

<main class="content">

    <div class="table-header">
        <h2>Daftar Alumni</h2>
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
            </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;

        if(mysqli_num_rows($sql) == 0){
            echo "<tr><td colspan='4' class='empty'>Data tidak ditemukan</td></tr>";
        }

        while($data = mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['angkatan'] ?></td>
                <td><?= $data['jurusan'] ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</main>

</body>
</html>