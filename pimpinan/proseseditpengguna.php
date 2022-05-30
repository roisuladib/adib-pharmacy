<?php

   include ("../koneksi.php");

   $nm   = $_POST['namapengguna'];
   $id   = $_POST['id'];
   $pwd  = $_POST['password'];

   if ($pwd<>'') {
      $pwdmd5    = md5($pwd);
      $queryEdit = mysqli_query($kon, "UPDATE pengguna SET namapengguna = '$nm', password = '$pwdmd5', WHERE idpengguna = '$id'");
   }
   else {
      $queryEdit = mysqli_query($kon, "UPDATE pengguna SET namapengguna = '$nm' WHERE idpengguna = '$id'");
   }

   echo "
      <script>
         alert('Ubah data berhasil !');
         document.location = 'index.php?halaman=data-pengguna';
      </script>
   ";
   // echo "
   //    <meta http-equiv='refresh' content='0; url=index.php?halaman=editdatapengguna&id=$id'>
   // ";

?>