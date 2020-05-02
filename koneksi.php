<?php
 $conn = mysqli_connect('localhost','root','','ppdb') or die(mysqli_error($conn));
if (!$conn) {
    echo "Koneksi Gagal";
}
?>