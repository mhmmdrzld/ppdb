<?php
require_once 'akses.php';
require_once '../koneksi.php';

$sql = mysqli_query($conn, "SELECT * FROM siswa  WHERE nopel = '" . $_SESSION['nopel'] . "'") or die(mysqli_error($conn));
$data = mysqli_fetch_array($sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi PPDB</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table,
        .td {
            border: 1px solid black;
            text-align: center;
        }

        .hijau {
            background-color: green;

        }
    </style>
</head>

<body>
    <div>
        <div>
            <h1>Selamat Datang, "<?php echo $_SESSION['nm_siswa']; ?>"</h1>
        </div>
        <div>
            Berikut Data Pendaftaran Anda
            <table class="table">
                <tr>
                    <td class="td hijau">No. Pendaftaran</td>
                    <td class="td hijau">Nama</td>
                    <td class="td hijau">NISN</td>
                    <td class="td hijau">Telpon</td>
                    <td class="td hijau">Jenis Kelamin</td>
                    <td class="td hijau">Status Registrasi</td>
                    <td class="td hijau">Tanggal Registrasi</td>
                </tr>
                <tr>
                    <td class="td"><?php echo $data['nopel'] ?></td>
                    <td class="td"><?php echo $data['nm_siswa'] ?></td>
                    <td class="td"><?php echo $data['nisn'] ?></td>
                    <td class="td"><?php echo $data['telp'] ?></td>
                    <td class="td"><?php echo $data['jk'] ?></td>
                    <td class="td"><?php echo $data['statusreg'] ?></td>
                    <td class="td"><?php echo $data['tgl_daftar'] ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            Silahkan Mengikuti Alur PPDB dibawah ini ... !
            <table>
                <tr>
                    <td>
                        <h2>1.</h2>
                    </td>
                    <td>
                        <h2>Register (<i style="color:<?php echo $data['statusreg'] == "Aktif" ? "Blue" : "Red" ?>"><?php echo $data['statusreg'] ?></i>)</h2>
                    </td>
                </tr>
                <?php
                if ($data['statusreg'] == "Blokir") {
                    echo "<br><i style='color:red'>Akun anda di blokir, anda tidak bisa melakukan proses selanjtnya, harap hubungi Admin/Sekolah</i>";
                } else {
                ?>
                    <tr>
                        <td>
                            <h2>2.</h2>
                        </td>
                        <td>
                            <h2>Login (<i style="color:blue">Berhasil</i>)</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>3.</h2>
                        </td>
                        <td>
                            <h2>Hasil Tes (<i style="color:<?php echo $data['statustes'] == "Lulus" ? 'blue' : ($data['statustes'] == "Belum" ? "orange" : "red") ?>"><?php echo $data['statustes'] ?></i>)</h2>
                        </td>
                    </tr>
                    <?php
                    if ($data['statustes'] == "Tidak Lulus") {
                        echo "<br><i style='color:red'>Maaf ya andak tidak lulus.</i>";
                    } else {
                    ?>
                        <tr>
                            <td>
                                <h2>4.</h2>
                            </td>
                            <td>
                                <h2>Daftar Ulang (<i style="color:blue"><?php echo $data['statusdaftarulang'] ?></i>) <?php echo $data['statusdaftarulang'] == "Belum" ? '<a href="">Link Daftar Ulang</a>' : '' ?></h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>5.</h2>
                            </td>
                            <td>
                                <h2>Pengumuman Akhir (<i style="color:<?php echo $data['statusakhir'] == "Belum" ? 'orange' : ($data['statusakhir'] == "Lulus" ? 'blue' : 'red') ?>"><?php echo $data['statusakhir'] ?></i>)</h2>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <a href="../logout.php">Logout</a>
    </div>
</body>

</html>