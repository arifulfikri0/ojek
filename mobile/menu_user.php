<?php
$user=@$_GET['user'];
switch ($user)
{
    case "pemesanan":
    if(!file_exists("pemesanan.php"))
    {
        echo"File yang anda panggil tidak ada !!";
    }
    else
    {
    include"pemesanan.php";
    }
break;

case "pembayaran":
    if(!file_exists("pembayaran.php"))
    {
        echo"File yang anda panggil tidak ada !!";
    }
    else
    {
    include"pembayaran.php";
    }
break;

default:
echo"<marquee><h1>SELAMAT DATANG DI HALAMAN USER</marquee></h1>";
break;
}
?>