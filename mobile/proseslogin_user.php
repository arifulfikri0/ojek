<?php
   session_start();
   //require_once("config.php");
   $connect = mysql_connect('localhost','root','') or die (mysql_error());
    mysql_select_db('mydb');
   $nm_user = $_POST['nm_user'];
   $password_user = $_POST['password_user'];
   $sql = "select * from users where nm_user = ";
   $sql .= "'". $nm_user . "'";
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
     if($password_user <> $hasil['password_user'])
     {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     }
     else 
     {
       $_SESSION['nm_user'] = $hasil['nm_user'];
       header('location:main_user.php');
     }
   }
?>