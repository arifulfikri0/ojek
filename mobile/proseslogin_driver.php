<?php
   session_start();
   //require_once("config.php");
   $connect = mysql_connect('localhost','root','') or die (mysql_error());
    mysql_select_db('mydb');
   $nm_driver = $_POST['nm_driver'];
   $password_driver = $_POST['password_driver'];
   $sql = "select * from driver where nm_driver = ";
   $sql .= "'". $nm_driver . "'";
   $cekuser = mysql_query($sql, $connect);
   //$cekuser = mysql_query("'select * from users where nm_user = Ariful Fikri'", $connect);
    //print_r($cekuser);

    //$check = mysql_num_rows($cekuser);
    //echo $check;
    
   $hasil = mysql_fetch_array($cekuser);
   if(mysql_num_rows($cekuser) == 0)
   {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   }
   else
   {
     if($password_driver <> $hasil['password_driver'])
     {
       echo "<div align='center'>Password salah! <a href='login_driver.php'>Back</a></div>";
     }
     else 
     {
       $_SESSION['nm_driver'] = $hasil['nm_driver'];
       header('location:main_driver.php');
     }
   }
?>