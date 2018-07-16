<?php
$panggil=@$_GET['panggil'];
switch ($panggil)
{
	case "user":
	if(!file_exists("user.php"))
	{
		echo"File yang anda panggil tidak ada !!";
	}
	else
	{
	include"user.php";
	}
break;

case "driver":
	if(!file_exists("driver.php"))
	{
		echo"File yang anda panggil tidak ada !!";
	}
	else
	{
	include"driver.php";
	}
break;

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

case "role":
	if(!file_exists("role.php"))
	{
		echo"File yang anda panggil tidak ada !!";
	}
	else
	{
	include"role.php";
	}
break;

default:
echo"<marquee><h1>SELAMAT DATANG DI HALAMAN ADMIN</marquee></h1>";
break;
}
?>