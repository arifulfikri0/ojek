<?php
$host ="localhost";
$user = "root";
$pass ="";
$nmdb = "mydb";

$koneksi = mysql_connect($host, $user, $pass) or die ("Koneksi ke Database Gagal !!");
mysql_select_db($nmdb, $koneksi) or die ("Tidak ada Database yang dipilih !!");
?>