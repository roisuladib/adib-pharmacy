<?php

   include ('../koneksi.php');
 
   //["nama"] berarti mengabil dri name="nama" dri form input
   $nmpengguna = $_POST["namapengguna"];
   $tlpn       = $_POST["teleponpengguna"];
   $username   = md5($_POST["username"]);
   $pwd        = $_POST["password"];
   $hak        = $_POST["hakakses"];
   $sts        = $_POST["status"];

   if ($pwd<>'') {
      $pwdmd5    = md5($pwd);
      $queryTambah = mysqli_query($kon, "INSERT INTO pengguna (namapengguna, teleponpengguna, username, password, hakakses, status ) VALUES ('$nmpengguna', '$tlpn','$username', '$pwdmd5', '$hak', '$sts')") OR DIE (mysqli_connect_error($kon));
   }
   echo "
      <script>
         alert('Tambah data sukses');
         document.location = 'index.php?halaman=data-pengguna';
      </script>
   ";
   // if ($queryTambah){
   // }
 ?>