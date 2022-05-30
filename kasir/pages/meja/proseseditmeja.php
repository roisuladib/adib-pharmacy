<?php

   include('../../../koneksi.php');

   $id         = $_POST['id'];
   $nomormeja = $_POST['nomormeja'];
   $keterangan = $_POST['keterangan'];

   $query_edit_kategory = mysqli_query($kon, "UPDATE meja SET nomormeja = '$nomormeja', keterangan = '$keterangan' WHERE idmeja = '$id'");

   echo "
      <script>
         alert('Ubah Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-meja'>      
   ";

?>