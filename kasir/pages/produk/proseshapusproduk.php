<?php

   include('../../../koneksi.php');

   $id                  = $_GET['id'];
   $query_hapus_kategori = mysqli_query($kon, "DELETE FROM produk WHERE idproduk = '$id'");

   echo "
      <script>
         alert('Hapus Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-produk'>
   ";

?>