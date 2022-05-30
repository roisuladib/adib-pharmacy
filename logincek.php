<?php

   include ("koneksi.php");
   session_start();

   $username   = $_POST["username"];
   $password   = $_POST["password"];
   $password   = md5 ($password);

   $pengguna   = mysqli_query($kon, "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password' ");
   $role       = mysqli_num_rows($pengguna);
   $value      = mysqli_fetch_array($pengguna);

   if ($role === 0) {
      header ('location:index.php?err=1');
   }
   else {
      $_SESSION["namapengguna"]     = $value["namapengguna"];
      $_SESSION["teleponpengguna"]  = $value["teleponpengguna"];
      $_SESSION["username"]         = $value["username"];
      $_SESSION["hakakses"]         = $value["hakakses"];      
      if ($value['hakakses'] === 'PIMPINAN') {
         header('location:pimpinan/');         
      }
      else {
         header('location:kasir/');
      }  
   }
   
?>