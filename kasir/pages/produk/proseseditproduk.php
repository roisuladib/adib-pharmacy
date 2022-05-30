<?php

   include('../../../koneksi.php');

   $id             = $_POST["id"];
   $kodeproduk     = $_POST["kodeproduk"];
   $namaproduk     = $_POST["namaproduk"];
   $hargaproduk    = $_POST["hargaproduk"]; 
   $idkategori     = $_POST["idkategori"];
   $namafotoproduk = $_FILES["fotoproduk"]["name"];

   if (!empty($namafotoproduk)) {
      $fotoproduk     = $_FILES["fotoproduk"]['name'];
      $namafoto       = $_POST['kodeproduk'] . '_produk_' . $fotoproduk;
      $fotoproduklama = $_POST["fotoproduklama"];
      unlink('../../../files/' . $fotoproduklama);
 
      if (is_uploaded_file($_FILES['fotoproduk']['tmp_name'])) {
         move_uploaded_file($_FILES['fotoproduk']['tmp_name'],'../../../files/'.$namafoto);
      }     
      $ubah_produk      = mysqli_query($kon, "UPDATE produk SET 
         kodeproduk     = '$kodeproduk',
         namaproduk     = '$namaproduk',
         hargaproduk    = '$hargaproduk',
         idkategori     = '$idkategori'
         fotoproduk     = '$fotoproduklama',
         WHERE idproduk = '$id' 
      ");       
   } 
   else {
      $ubah_produk      = mysqli_query($kon, "UPDATE produk SET 
         kodeproduk     = '$kodeproduk',
         namaproduk     = '$namaproduk',
         hargaproduk    = '$hargaproduk',
         idkategori     = '$idkategori'         
         WHERE idproduk = '$id' 
      "); 
   }

   echo "
      <script>
         alert('data berhasil diubah');
      </script>
   "; 
   echo "  
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-produk' />
   ";   

?>