<?php

   include('../../../koneksi.php');

   $id                  = $_GET['id'];
   $query_hapus_meja = mysqli_query($kon, "DELETE FROM meja WHERE idmeja = '$id'");

   echo "
      <script>
         alert('Hapus Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-meja'>
   ";

?>