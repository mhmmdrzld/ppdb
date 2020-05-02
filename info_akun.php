<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT nopel,telp FROM siswa WHERE nisn='$id'") or die(mysqli_error($conn));
$data = mysqli_fetch_array($sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi PPDB</title>
</head>

<body>
    <div>
        <div>
            <h1>Informasi Akun Anda</h1>
        </div>
        <div>
            Pendaftara anda telah berhasil, silahkan ingat informasi akun anda dibawah ini untuk masuk.
        </div>
        <div>
            <div>
                <h2>No Pendaftaran : <?php echo $data['nopel']; ?></h2>
            </div>
            <div>
                <h2>Telpon : <?php echo $data['telp']; ?></h2>
            </div>
        </div>
        <div>
            <div>Silahkan Masuk pada <a href="masuk.php">HALAMAN INI</a></div>
        </div>
    </div>
</body>

</html>