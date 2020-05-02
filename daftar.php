<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nm_siswa = $_POST['nm_siswa'];
    $nisn = $_POST['nisn'];
    $telp = $_POST['telp'];
    $jk = $_POST['jk'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nilai_akhir = $_POST['nilai_akhir'];

    $statusreg = "Aktif";
    $tgl_daftar = date('Y-m-d');
    $statustes = "Belum";
    $statusdaftarulang = "Belum";
    $statusakhir = "Belum";

    $sql = mysqli_query($conn, "INSERT INTO 
    `siswa`( `nm_siswa`, `nisn`, `telp`, `jk`, `asal_sekolah`, `nilai_akhir`, `statusreg`, `tgl_daftar`, `statustes`,  `statusdaftarulang`,  `statusakhir`) 
    VALUES ('$nm_siswa', '$nisn', '$telp', '$jk', '$asal_sekolah', '$nilai_akhir', '$statusreg', '$tgl_daftar', '$statustes', '$statusdaftarulang', '$statusakhir');") or die(mysqli_error($conn));

    if ($sql) {
        echo "<script language='javascript'>alert('Data Berhasil Disimpan'); document.location='info_akun.php?id=$nisn';</script>";
    } else {
        echo "<script language='javascript'>alert('Data Gagal Disimpan'); document.location='daftar.php';</script>";
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
            <h1>Daftar</h1>
        </div>
        <div>
            Silahkan memasukkan data pada form dibawah ini.
        </div>
        <div>
            <form action="daftar.php" method="POST">
                <table>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><input type="text" name="nm_siswa"></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><input type="text" name="nisn"></td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td><input type="text" name="telp"></td>
                    </tr>
                    <tr>
                        <td>Jk</td>
                        <td>:</td>
                        <td><select name="jk" id="">
                                <option value="">-Pilih Jenis Kelamin-</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><input type="text" name="asal_sekolah"></td>
                    </tr>
                    <tr>
                        <td>Nilai Akhir</td>
                        <td>:</td>
                        <td><input type="text" name="nilai_akhir"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit">Simpan</button></td>
                        <td><button type="button" name="kembali" onclick="self.history.back()">Kembali</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>