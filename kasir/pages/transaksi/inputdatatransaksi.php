<?php

   include ('../koneksi.php');

   if (isset($_POST['submit'])) {
      $idproduk        = $_POST['idproduk'];
      $jumlahtransaksi = $_POST['jumlahtransaksi'];
      $username        = $_SESSION['username'];
      $simpan_temp     = mysqli_query($kon, "INSERT INTO temp (idproduk, jumlahtransaksi, username) VALUES ( '$idproduk', '$jumlahtransaksi', '$username')");
   }

   if (isset($_POST['transaksisubmit'])) {
      $kodetransaksi    = $_POST['kodetransaksi'];
      $tanggaltransaksi = $_POST['tanggaltransaksi'];
      $idmeja           = $_POST['idmeja'];
      $totalharga       = $_POST['totalharga'];
      $simpan_transaksi = mysqli_query($kon, "INSERT INTO transaksi (idmeja, tanggaltransaksi, kodetransaksi, totalharga) VALUES ('$idmeja', '$tanggaltransaksi', '$kodetransaksi', '$totalharga')");
      // Simpan Temp Ke Transaksi
      $simpan           = mysqli_query($kon, "SELECT * FROM temp WHERE username = '". $_SESSION['username'] ."' ");
      while ($data      = mysqli_fetch_array($simpan)) {
         $detail        = mysqli_query($kon, "INSERT INTO detailtransaksi (kodetransaksi, idproduk, jumlahtransaksi) VALUES('$kodetransaksi', '". $data['idproduk'] ."', '". $data['jumlahtransaksi'] ."')");
      }
      mysqli_query($kon, "DELETE FROM temp WHERE username = '".$_SESSION['username']."'");
   }

   if (isset($_GET['idhapus'])) {
      mysqli_query($kon, "DELETE FROM temp WHERE idtemp = '".$_GET['idhapus']."'");
      $txtError = 'Data barang berhasil dihapus';
   }

   //kode Transaksi
   $qtransaksi    = mysqli_query($kon, "SELECT max(kodetransaksi) as kodeTerbesar FROM transaksi");
   $dtransaksi    = mysqli_fetch_array($qtransaksi);
   $kodetransaksi = $dtransaksi['kodeTerbesar'];
   $urutan        = (int) substr($kodetransaksi, 2, 8);
   $urutan++;
   $huruf         = "TR";
   $kodetransaksi = $huruf . sprintf("%08s", $urutan);

?>

<div class="container-fluid p-0">
   <div class="row">
      <div class="col-12 col-lg-4">
         <div class="card shadow mb-4 b-20 border-none">
            <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold text-primary">
                  Tambah Data Pesanan
               </h5>
            </div>
            <div class="card-body">
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="lblInput" for="idproduk">Nama Obat</label>
                     <select type="text" name="idproduk" id="idproduk" class="form-control custom-select b-20" data-rel="chosen">
                        <option value="" selected disabled>~ Pilih Obat ~</option>
                        <?php 
                           $produk = mysqli_query($kon, 'SELECT * FROM produk');
                           while ($data = mysqli_fetch_array($produk)) {
                              echo "
                                 <option value='$data[idproduk]'>
                                    $data[namaproduk]
                                 </option>
                              ";
                           }
                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="lblInput" for="hargaproduk">Price</label>
                     <input type="number" name="hargaproduk" id="hargaproduk" class="form-control b-20" required />
                  </div>               
                  <div class="form-group">
                     <label class="lblInput" for="jumlahtransaksi">Order quantity</label>
                     <input type="number" name="jumlahtransaksi" id="jumlahtransaksi" class="form-control b-20" required />
                  </div>               
                  <button type="submit" id="submit" name="submit" class="btn btn-block btn-sape mb-3 mt-4 box-shadow-none">Tambah</button>                              
               </form>   
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-8">
         <div class="card shadow mb-0 b-20 border-none">
            <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold text-primary">
                  Detail Data Transaksi
               </h5>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-3">
                           <label for="idmeja">Nomor meja</label>
                        </div>
                        <div class="col-md-9">
                           <select name="idmeja" id="idmeja" class="form-control custom-select b-20" data-rel="chosen">
                              <option value="" disabled selected>~ Pilih Meja ~</option>
                              <?php
                                 $meja = mysqli_query($kon, 'SELECT * FROM meja');
                                 while ($data = mysqli_fetch_array($meja)) {
                                    echo "
                                       <option value='$data[idmeja]'>
                                          $data[nomormeja]
                                       </option>                                             
                                    ";
                                 }
                              ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-3">
                           <label for="tanggaltransaksi">Tanggal</label>
                        </div>
                        <div class="col-md-9">
                           <?php $date = date('Y-m-d'); ?>
                           <input type="date" class="form-control b-20" name="tanggaltransaksi" id="tanggaltransaksi" value="<?= $date;?>" required />
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-3">
                           <label for="tanggaltransaksi">Kode Transaksi</label>
                        </div>
                        <div class="col-md-9">
                           <input type="text" class="form-control b-20" name="kodetransaksi" id="kodetransaksi" value="<?= $kodetransaksi;?>" readonly required />
                        </div>
                     </div>
                  </div>
                  <hr />
                  <div class="table-responsive">
                     <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <td>No</td>
                              <td>Menu</td>
                              <td>Harga</td>
                              <td>Jumlah Pesanan</td>
                              <td>Subtotal</td>
                              <td>Actions</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $no = 0;
                              $total = 0;
                              $temp        = mysqli_query($kon, 'SELECT * FROM temp');
                              while ($data = mysqli_fetch_array($temp)) {
                                 $no++;
                                 $produk   = mysqli_query($kon, 'SELECT * FROM produk WHERE idproduk = "'. $data['idproduk'] .'"');
                                 $d_produk = mysqli_fetch_array($produk);
                           ?>
                              <tr>
                                 <td><?= $no; ?></td>
                                 <td><?= $d_produk['namaproduk']; ?></td>
                                 <td><?= number_format($d_produk['hargaproduk'],0,',','.'); ?></td>
                                 <td><?= $data['jumlahtransaksi']; ?></td>
                                 <td>
                                    <?php
                                       $subttl = $d_produk['hargaproduk'] * $data['jumlahtransaksi'];
                                       echo number_format($subttl);
                                    ?>
                                 </td>
                                 <td align="center">
                                    <a href="index.php?halaman=input-data-transaksi&idhapus=<?= $data['idtemp']; ?>" onClick="return confirm('Apakah Data Akan Dihapus?')" class="btn btn-danger btn-circle btn-sm">
                                       <i class="fas fa-trash"></i>
                                    </a>
                                 </td>
                              </tr>
                              <?php
                                 $total = $total+$subttl;
                                 }
                              ?>
                        </tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td><?= number_format($total);?></td>
                           <td></td>
                        </tr>
                     </table>
                  </div>
                  <input type="hidden" name="totalharga" id="totalharga" value="<?= $total; ?>">
                  <button type="submit" name="transaksisubmit" id="transaksisubmit" class="btn btn-block btn-sape box-shadow-none mt-3" disabled>Simpan Transaksi</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>   

<!-- Cetak Nota Transaksi -->
<script>
   function PopupWindowCenter(url, w, h) {
      const left   = (screen.width/2)-(w/2);
      const top    = (screen.height/2)-(h/2);
      const newWin = window.open (url, 'Transaksi', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+ left);
   }
</script>