<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-mortar-pestle"></i>
         Data Kategori         
      </h6>
   </div>
   <div class="card-body">
      <a href="#" type="button" data-toggle="modal" data-target="#tambahModal" class="btn mb-3 btnMyPro box-shadow-none" title="Tambah Data Kategori">
            Tambah Kategori
      </a>
      <!-- <a href="index.php?halaman=inputdatakategori" class="btn mb-3 btnMyPro">
            Tambah Kategori
      </a> -->
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th width="50%">Nama Ketegori</th>
                  <th width="50%">Keterangan</th>
                  <th width="50%">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php                                               
                  $no               = 0; 
                  $query_category   = mysqli_query($kon, 'SELECT * FROM kategori');
                  while ($data      = mysqli_fetch_array($query_category)) {
                     $no++;
               ?>
               <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['namakategori']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td class="align-center">
                     <a href="index.php?halaman=edit-data-kategori&id=<?php echo $data['idkategori']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Kategori <?php echo $data['namakategori']; ?> ?">
                        <i class="fas fa-pencil-alt"></i>
                     </a>  
                     <!-- <a href="#" type="button" data-toggle="modal" data-target="#editModal" data-id="<?= $data['idkategori']; ?>" data-nama="<?= $data['namakategori']; ?>" data-keterangan="<?= $data['keterangan']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Kategori <?php echo $data['namakategori']; ?> ?">
                        <i class="fas fa-pencil-alt"></i>
                     </a>  -->
                     <a href="pages/kategori/proseshapuskategori.php?id=<?php echo $data['idkategori']; ?>" onClick="return confirm('Apakah Kategori <?php echo $data['namakategori']; ?>, Yakin Hapus ?')" class="btn btn-danger btn-circle btn-sm" title="Hapus Kategori <?php echo $data['namakategori']; ?> ?">
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content b-12" style="padding: 0px 10px 15px 10px">
         <div class="modal-header title-modal b-h-12 justify-content-center mb-2" style="border-bottom: none !important; margin: -10px;">
            <h5 class="modal-title" id="exampleModalLabel">              
               Tambah Data Kategori              
            </h5>            
         </div>
         <div class="modal-body">             
            <form action="pages/kategori/prosesinputkategori.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="lblInput" for="namakategori">Nama Kategori</label>
                  <input type="text" name="namakategori" id="namakategori" class="form-control b-20" placeholder="Enter Category Name...." autofocus required>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="keterangan">Keterangan</label>
                  <input type="text" name="keterangan" id="keterangan" class="form-control b-20" placeholder="Enter Keterangan...." required>
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

<!-- Edit Tambah Data -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editDataKategori" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content b-12" style="padding: 0px 10px 15px 10px">
         <div class="modal-header title-modal b-h-12 justify-content-center mb-2" style="border-bottom: none !important; margin: -10px;">
            <h5 class="modal-title" id="editDataKategori">              
               Edit Data Kategori              
            </h5>            
         </div>
         <div class="modal-body">                        
            <form action="pages/kategori/proseseditkategori.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $data['idkategori']; ?>" />
               <div class="form-group">                  
                  <label class="lblInput" for="namakategori">Nama Kategori</label>
                  <input type="text" name="namakategori" id="namakategori" value="<?php echo $data['namakategori']; ?>" class="form-control b-20" required />
               </div>
               <div class="form-group">
                  <label class="lblInput" for="keterangan">Keterangan</label>
                  <input type="text" name="keterangan" id="keterangan" value="<?php echo $data['keterangan']; ?>" class="form-control b-20" required />
               </div>
               <button type="submit" name="editKategori" class="btn btn-block btn-sape mb-3 mt-4 box-shadow-none">Edit</button>
               <button type="button" class="btn btn-block btn-tutup box-shadow-none" data-dismiss="modal">Cancel</button>
            </form>                 
         </div>       
      </div>
   </div> 
</div> -->