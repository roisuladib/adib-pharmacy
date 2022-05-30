<?php

   include('../../../koneksi.php');

   $idkategori     = $_POST['idkategori'];
   $kodeproduk     = $_POST['kodeproduk'];
   $namaproduk     = $_POST['namaproduk'];
   $hargaproduk    = $_POST['hargaproduk'];
   $namafotoproduk = $_FILES['fotoproduk']['name'];

   if (!empty($namafotoproduk)) {
      $fotoproduk = $_FILES['fotoproduk']['name'];
      $namafoto   = $_POST['kodeproduk']. '_produk_' . $fotoproduk;
      if (is_uploaded_file($_FILES['fotoproduk']['tmp_name'])) {
         move_uploaded_file($_FILES['fotoproduk']['tmp_name'], '../../../files/' . $namafoto);
      }
      $simpan = mysqli_query($kon, "INSERT INTO produk (idkategori, kodeproduk, namaproduk, hargaproduk, fotoproduk) VALUES ('$idkategori', '$kodeproduk', '$namaproduk', '$hargaproduk', '$namafoto')");
   }
   else {
      $simpan = mysqli_query($kon, "INSERT INTO produk (idkategori, kodeproduk, namaproduk, hargaproduk) VALUES ('$idkategori', '$kodeproduk', '$namaproduk', '$hargaproduk')");
   }
   echo "
      <script>
         alert('Tambah Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-produk'>
   ";

?>