<?php
session_start();
unset($_SESSION["nopel"]);
unset($_SESSION["nm_siswa"]);
header("Location:index.php");
