<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nopel = $_POST['nopel'];
    $telp = $_POST['telp'];

    $query = mysqli_query($conn, "SELECT * FROM `siswa` WHERE nopel='$nopel' AND telp ='$telp'")  or die(mysqli_error($conn));
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $dt = mysqli_fetch_array($query);
        $_SESSION['nopel'] = $dt['nopel'];
        $_SESSION['nm_siswa'] = $dt['nm_siswa'];
        echo "<script language='javascript'>alert('Anda Berhasil Login'); document.location='user/index.php';</script>";
    } else {
        echo "<script language='javascript'>alert('Anda Gagal Login'); document.location='masuk.php';</script>";
    }
}

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
            <h1>Aplikasi PPDB</h1>
        </div>
        <div>
            Silahkan login pada form dibawah ini, atau <a href="daftar.php">DAFTAR</a> apabila belum mempunyai akun.
        </div>
        <div>
            <form action="masuk.php" method="POST">
                <table>
                    <tr>
                        <td>No. Pendaftaran</td>
                        <td>:</td>
                        <td><input type="text" name="nopel"></td>
                    </tr>
                    <tr>
                        <td>Telpon</td>
                        <td>:</td>
                        <td><input type="text" name="telp"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" name="submit">Masuk</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>