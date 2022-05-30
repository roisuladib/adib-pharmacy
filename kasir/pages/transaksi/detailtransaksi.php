<?php

   include ('../koneksi.php');

   $id = $_GET['id'];
   $transaksi = mysqli_query($kon, "SELECT * FROM transaksi WHERE idtransaksi = '$id'");
   $data      = mysqli_fetch_array($transaksi);
   $meja      = mysqli_query($kon, "SELECT * FROM meja WHERE idmeja = '". $data['idmeja'] ."'");
   $datameja  = mysqli_fetch_array($meja);

?>

<div class="row">
   <!-- Kolom 1 -->
   <div class="col-lg-12">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>     
         </div>
         <div class="card-body">
            <div class="form-group row">
               <label class="col-lg-3 col-form-label">Nomor Meja</label>
               <input type="text" class="form-control col-lg-9" name="kodetransaksi" id="kodetransaksi" value="<?= $datameja['nomormeja']; ?>" readonly>
            </div>
            <div class="form-group row">
               <label class="col-lg-3 col-form-label">Tanggal Transaksi</label>
               <input type="text" class="form-control col-lg-9" name="tanggaltransaksi" id="tanggaltransaksi" value="<?= $data['tanggaltransaksi']; ?>" readonly>
            </div>
            <div class="form-group row">
               <label class="col-lg-3 col-form-label">Kode Transaksi</label>
               <input type="text" class="form-control col-lg-9" name="kodetransaksi" id="kodetransaksi" value="<?= $data['kodetransaksi']; ?>" readonly>
            </div>
            <hr>
            <div class="table-responsive">
               <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                     <tr class="text-center">
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah Pesan</th>
                        <th>Sub Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $total      = 0;
                        $qdata      = mysqli_query($kon, "SELECT * FROM detailtransaksi WHERE kodetransaksi = '". $data['kodetransaksi'] ."'");
                        while($data = mysqli_fetch_array($qdata)) {
                           $qproduk = mysqli_query($kon,"SELECT * FROM produk WHERE idproduk = '". $data['idproduk']. "'");
                           $dproduk = mysqli_fetch_array($qproduk);
                     ?>
                     <tr>
                        <td><?= $dproduk['namaproduk']; ?></td>
                        <td class="text-right"><?= number_format($dproduk['hargaproduk'],0,',','.'); ?></td>
                        <td class="text-center"><?= $data['jumlahtransaksi']; ?></td>
                        <td class="text-right">
                           <?php
                              $subtotal = $dproduk['hargaproduk'] * $data['jumlahtransaksi'];
                              echo number_format($subtotal,0,',','.');
                           ?>
                        </td>
                     </tr>
                     <?php
                        $total=$total+$subtotal;
                        }
                     ?>
                  </tbody>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td class="text-right"><?= number_format($total,0,',','.');?></td>
                  </tr>
               </table>
            </div>
            <button type="submit" onClick="history.go(-1)" class="btn btn-danger btn-user btn-block">Close Detail</button>
         </div>
      </div>
   </div>
</div>