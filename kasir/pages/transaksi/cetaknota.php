<?php

   include ('../../../koneksi.php');

   $id         = $_GET['id'];

   $transaksi  = mysqli_query($kon,"SELECT * FROM transaksi WHERE idtransaksi = '$id'");
   $data       = mysqli_fetch_array($transaksi);

   $meja       = mysqli_query($kon,"SELECT * FROM meja WHERE idmeja = '". $data['idmeja'] ."'");
   $datameja   = mysqli_fetch_array($meja);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Nota Penjualan</title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <style type="text/css">
      body {
         font-family: verdana, arial, sans-serif;
         font-size: 12px;
      }
      th,
      td {
         padding: 4px 4px 4px 4px;
      }
      th {
         border-top: 2px solid #333333;
         border-bottom: 2px solid #333333;
      }
      td {
         border-bottom: 1px dotted #999999;
      }
      tfoot td {
         border-bottom-width: 0px;
         border-top: 2px solid #333333;
         padding-top: 20px;
      }
      /* Screen Only */
      @media screen {
         .noprint {display:block !important;}
         .noshow {display:none !important;}
      }
      /* Print Only */
      @media print {
         .noprint {display:none !important;}
         .noshow {display:block !important;}
      }
      body,td,th {
         font-size: 14px;
      }
   </style>
   <link rel="stylesheet" href="../../../vendor/fontawesome-free/css/all.min.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
   <link rel="stylesheet" href="../../../css/sb-admin-2.min.css" />
</head>
<body>
   <div align="center">
      <span class="noprint">
         <br />
         <a href="javascript:window.print();" class="btn btn-primary">
            <i class="fa fa-print"></i> 
            Cetak
         </a>
         <a href="javascript:window.close();" class="btn btn-danger">
            <i class="fa fa-power-off"></i>
            Close
         </a>
         <br />
      </span>
      <cfoutput>
         <h2 class="mt-5">NOTA PENJUALAN</h2>
         <h3><?= 'Adib Pharmacy'; ?></h3>
         <?= date('d-m-Y H:i:s A');?>
         <hr width="580">
         <table width="580" cellspacing="0">
            <thead>
               <tr>
                  <th colspan="3">Detail Penjualan</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>ID Penjualan</td>
                  <td>:</td>
                  <td><?= $data['kodetransaksi']; ?> </td>
               </tr>
               <tr>
                  <td>Tanggal Penjualan</td>
                  <td>:</td>
                  <td><?= $data['tanggaltransaksi']; ?></td>
               </tr>
               <tr>
                  <td>Meja</td>
                  <td>:</td>
                  <td><?= $datameja['nomormeja']; ?></td>
               </tr>
            </tbody>
         </table>
         <br />
         <table width="580" cellspacing="0">
            <thead>
               <tr>
                  <th>Nama Barang</th>
                  <th class="text-right">Harga</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-right">Subtotal</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $total      = 0;
                  $qdata      = mysqli_query($kon,"SELECT * FROM detailtransaksi where kodetransaksi = '". $data['kodetransaksi'] ."'");
                  while($data = mysqli_fetch_array($qdata)) {
                     $qproduk    = mysqli_query($kon,"SELECT * FROM produk WHERE idproduk='".$data['idproduk']."'");
                     $dproduk=mysqli_fetch_array($qproduk);
               ?>
               <tr>
                  <td><?= $dproduk['namaproduk']; ?> </td>
                  <td class="text-right"><?= number_format($dproduk['hargaproduk'],0,",","."); ?></td>
                  <td class="text-center"><?= $data['jumlahtransaksi']; ?></td>
                  <td class="text-right">
                     <?php
                        $subtotal = $dproduk['hargaproduk'] * $data['jumlahtransaksi'];
                        echo number_format($subtotal,0,",",".");
                     ?>
                  </td>
               </tr>
               <?php
                  $total = $total+$subtotal;
                  }
               ?>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-right"><?= number_format($total,0,",",".");?></td>
               </tr>
            </tbody>
         </table>
      </cfoutput>
   </div>
</body>
</html>