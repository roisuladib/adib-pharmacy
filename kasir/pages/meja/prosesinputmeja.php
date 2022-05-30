<?php

   include ('../../../koneksi.php');
   
   $nomormeja   = $_POST['nomormeja'];
   $keterangan = $_POST['keterangan'];
   
   $simpan = mysqli_query($kon, "INSERT INTO meja (nomormeja, keterangan) VALUES ('$nomormeja', '$keterangan')");
   echo "
      <script>
         alert('Tambah Data Berhasil');
      </script>
   ";
   echo "
      <meta http-equiv='refresh' content='0; url=../../index.php?halaman=data-meja'>
   ";

?>