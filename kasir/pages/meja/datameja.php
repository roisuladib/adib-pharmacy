<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <div class="m-0 font-weight-bold text-primary">
         <i class="fas fa-chair"></i>
         Data Meja
      </div>
   </div>
   <div class="card-body">
      <a href="#" type="button" data-toggle="modal" data-target="#tambahModal" class="btn mb-3 btnMyPro box-shadow-none" title="Tambah data meja">
            Tambah Meja
      </a>
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <th>No</th>
               <th>Nomor Meja</th>
               <th>Keterangan</th>               
               <th>Action</tr>
            </thead>
            <tbody>
               <?php                  
                  $no            = 0; 
                  $query_meja  = mysqli_query($kon, 'SELECT * FROM meja');
                  while ($data   = mysqli_fetch_array($query_meja)) {                    
                     $no ++;                  
               ?>
               <tr>
                  <td width="20px"><?= $no; ?></td>
                  <td><?= $data['nomormeja']; ?></td>
                  <td width="50%"><?= $data['keterangan']; ?></td>                 
                  <td align="center" width="20px">
                     <a href="index.php?halaman=edit-data-meja&id=<?php echo $data['idmeja']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit <?= $data['nomormeja'];?> ?">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                     <a href="pages/meja/proseshapusmeja.php?id=<?php echo $data['idmeja']; ?>" onClick="return confirm('Apakah Kode <?php echo $data['nomormeja']; ?>, Yakin Hapus ?')" class="btn btn-danger btn-circle btn-sm" title="Hapus <?= $data['nomormeja'];?> ?">
                        <i class="fas fa-trash-alt"></i>
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

<?php

   include '../koneksi.php';      
   $query_meja = mysqli_query($kon, 'SElECT MAX(nomormeja) AS kodeTerbesar FROM meja');
   $data           = mysqli_fetch_array($query_meja);
   $nomormeja     = $data['kodeTerbesar'];

   $urutan         = (int) substr ($nomormeja, 2, 5);
   $urutan++;

   $huruf = "MJ"; 
   $nomormeja = $huruf . sprintf("%05s", $urutan); 
   
?>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content b-12" style="padding: 0px 10px 15px 10px">
         <div class="modal-header title-modal b-h-12 justify-content-center mb-2" style="border-bottom: none !important; margin: -10px;">
            <h5 class="modal-title" id="exampleModalLabel">              
               Tambah Data Meja              
            </h5>            
         </div>
         <div class="modal-body">             
            <form action="pages/meja/prosesinputmeja.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="lblInput" for="nomormeja">Nomor Meja</label>
                  <input type="text" name="nomormeja" id="nomormeja" value="<?php echo $nomormeja; ?>" class="form-control b-20" placeholder="Enter table code..." readonly>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="keterangan">Keterangan</label>
                  <input type="text" name="keterangan" id="keterangan" class="form-control b-20" placeholder="Enter tablen name..." autofocus required>
               </div>               
               <button type="submit" class="btn btn-block btn-sape mb-3 mt-4 box-shadow-none">Tambah</button>
               <button type="button" class="btn btn-block btn-tutup box-shadow-none" data-dismiss="modal">               
                  Cancel
               </button>
            </form>                 
         </div>       
      </div>
   </div>
</div>