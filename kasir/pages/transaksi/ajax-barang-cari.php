<?php

   include "../../../koneksi.php";

   $query = mysqli_query($kon, "SELECT * FROM produk WHERE idproduk = '". $_GET['idproduk'] ."'");
   $data  = mysqli_fetch_array($query);
   echo json_encode($data);

?>