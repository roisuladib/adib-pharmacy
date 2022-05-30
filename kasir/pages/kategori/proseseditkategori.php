<?php

   include('../../../koneksi.php');

   $id         = $_POST['id'];
   $nmkategori = $_POST['namakategori'];
   $keterangan = $_POST['keterangan'];

   $query_edit_kategory = mysqli_query($kon, "UPDATE kategori SET namakategori = '$nmkategori', keterangan = '$keterangan' WHERE idkategori = '$id'");

   echo "
      <script>
         alert('Ubah Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-kategori'>      
   ";

?>