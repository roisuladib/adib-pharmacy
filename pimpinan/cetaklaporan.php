<?php

   include ('../koneksi.php');

   $awal       = $_GET['awal'];
   $akhir      = $_GET['akhir'];
   $transaksi  = mysqli_query($kon,"SELECT * FROM transaksi WHERE tanggaltransaksi between '$awal' AND '$akhir'");
   //$data=mysqli_fetch_array($transaksi);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Laporan Transaksi</title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <style>
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
   <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
   <link rel="stylesheet" href="../css/sb-admin-2.min.css" />
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
      <br/><br/>
         <table width="800" cellspacing="0">
            <tbody>
               <tr>
                  <td><img src="../images/ic_react.svg" align="left" style="max-width: 110px;" hspace="50"></td>
                  <td>
                     <h4>Adib Pharmacy</h4>
                     <h6><?= "LAPORAN TRANSAKSI PENJUALAN"; ?></h6>
                     Periode <?= $awal.' s.d. '.$akhir;?>
                     <br>
                     <?= date("d-m-Y h:i:s A");?>
                  </td>
               </tr>
            </tbody>
         </table>
         <hr style="border: 2px solid #000000; width: 800px" />
         <table width="800" cellspacing="0">
            <thead>
               <tr>
                  <th>Kode Transaksi</th>
                  <th class="text-center">Tanggal Transaksi</th>
                  <th class="text-center">Nomor Meja</th>
                  <th class="text-right">Sub Total</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $total = 0;
                  while($data = mysqli_fetch_array($transaksi)){
                     $qmeja=mysqli_query($kon,"SELECT * FROM meja WHERE idmeja = '". $data['idmeja'] ."'");
                     $datameja=mysqli_fetch_array($qmeja);
               ?>
               <tr>
                  <td><?= $data['kodetransaksi']; ?> </td>
                  <td class="text-center"><?= $data['tanggaltransaksi']; ?></td>
                  <td class="text-center"><?= $datameja['nomormeja']; ?></td>
                  <td class="text-right"><?= number_format($data['totalharga'],0,",","."); ?></td>
               </tr>
               <?php
                  $total = $total + $data['totalharga'];
               }
               ?>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-right"><?= number_format($total,0,",","."); ?></td>
               </tr>
            </tbody>
         </table>
         <table width="800" cellspacing="0">
            <tbody>
               <tr>
                  <td width="50%" class="text-center">
                     <br /><br />
                     Mengetahui,
                     <br /><br /><br /><br /><br />
                     (Mas Adib)
                  </td>
                  <td width="50%" class="text-center">
                     Semarang, <?= date("d / m / Y"); ?>
                     <br /><br />
                     Manajer Resto,
                     <br /><br /><br /><br /><br />
                     (Santy Rahayu)
                  </td>
               </tr>
            </tbody>
         </table>
      </cfoutput>
   </div>
</body>
</html>