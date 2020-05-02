<?php
 session_start();
 if(!isset($_SESSION['nm_siswa']) && !isset($_SESSION['nopol'])){
    header('location:../index.php');
 }