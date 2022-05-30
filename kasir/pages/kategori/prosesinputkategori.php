<?php

   include('../../../koneksi.php');

   $nmkategori = $_POST['namakategori'];
   $keterangan = $_POST['keterangan'] ;

   $simpan     = mysqli_query($kon, "INSERT INTO kategori (namakategori, keterangan) VALUES ('$nmkategori', '$keterangan')");
   echo "
      <script>
         alert('Tambah Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-kategori'>
   ";

?>