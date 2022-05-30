<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <div class="m-0 font-weight-bold text-primary">
         <i class="fas fa-dollar-sign"></i>
         Data Transaksi
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <th width="5%">No</th>
               <th>Kode</th>
               <th>Tanggal</th>               
               <th>No. Meja</th>               
               <th>Jumlah</th>               
               <th>Action</tr>
            </thead>
            <tbody>
               <?php                 
                  $no            = 0; 
                  $transaksi     = mysqli_query($kon, 'SELECT * FROM transaksi');
                  while ($data   = mysqli_fetch_array($transaksi)) {                    
                     $no ++;      
                     $meja       = mysqli_query($kon, 'SELECT * FROM meja WHERE idmeja = "'. $data['idmeja'] .'"');     
                     $nomor_meja = mysqli_fetch_array($meja);       
               ?>
               <tr>
                  <td><?= $no; ?></td>
                  <td><?= $data['kodetransaksi']; ?></td>
                  <td><?= $data['tanggaltransaksi']; ?></td>                 
                  <td><?= $nomor_meja['nomormeja']; ?></td>                 
                  <td><?= number_format($data['totalharga'],0,',','.'); ?></td>                 
                  <td align="center" width="20px">
                     <a href="index.php?halaman=detail-transaksi&id=<?= $data['idtransaksi']; ?>" class="btn btn-info btn-circle btn-sm" title="Lihat <?= $data['kodetransaksi'];?> ?">
                        <i class="fas fa-eye"></i>
                     </a>
                  </td>
               </tr>
               <?php
                 }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>