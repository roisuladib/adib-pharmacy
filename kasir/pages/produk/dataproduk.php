<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <div class="m-0 font-weight-bold text-primary">
         <i class="fas fa-cube"></i>
         Data Produk
      </div>
   </div>
   <div class="card-body">
      <a href="#" type="button" data-toggle="modal" data-target="#tambahModal" class="btn mb-3 btnMyPro box-shadow-none" title="Tambah data produk">
            Tambah Produk
      </a>
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <th>No</th>
               <th>Kode Produk</th>
               <th>Nama Produk</th>
               <th>Harga</th>
               <th>Kategori</th>
               <th>Foto</th>
               <th>Action</tr>
            </thead>
            <tbody>
               <?php
                  include ('style/format_rupiah.php');
                  $no            = 0; 
                  $query_produk  = mysqli_query($kon, 'SELECT * FROM produk');
                  while ($data   = mysqli_fetch_array($query_produk)) {
                     $query_categery = mysqli_query($kon, "SELECT * FROM kategori WHERE idkategori = '".$data['idkategori']."' ");
                     $data_category  = mysqli_fetch_array($query_categery);
                     $no ++;                  
               ?>
               <tr>
                  <td width="20px"><?= $no; ?></td>
                  <td><?= $data['kodeproduk']; ?></td>
                  <td><?= $data['namaproduk']; ?></td>
                  <td><?= rupiah($data['hargaproduk']); ?></td>
                  <td><?= $data_category['namakategori']; ?></td>
                  <td>
                     <?php
                        if (!empty($data['fotoproduk'])) {
                           echo "
                              <img src='../files/$data[fotoproduk]' style='max-width: 200px; max-height: 300px;' alt='foto produk' />
                           ";                   
                        }
                        else {
                           echo '
                              <p class="mb-0">Foto kosong</p>
                           ';
                        }
                     ?>
                  </td>
                  <td align="center" width="20px">
                     <a href="index.php?halaman=edit-data-produk&id=<?php echo $data['idproduk']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit <?= $data['namaproduk'];?> ?">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                     <a href="pages/produk/proseshapusproduk.php?id=<?php echo $data['idproduk']; ?>" onClick="return confirm('Apakah Kategori <?php echo $data['namaproduk']; ?>, Yakin Hapus ?')" class="btn btn-danger btn-circle btn-sm" title="Hapus <?= $data['namaproduk'];?> ?">
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
   $query_categery = mysqli_query($kon, 'SElECT MAX(kodeproduk) AS kodeTerbesar FROM produk');
   $data           = mysqli_fetch_array($query_categery);
   $kodeproduk     = $data['kodeTerbesar'];

   $urutan         = (int) substr ($kodeproduk, 2, 5);
   $urutan++;

   $huruf = "AP"; 
   $kodeproduk = $huruf . sprintf("%05s", $urutan); 
   
?>
 
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content b-12" style="padding: 0px 10px 15px 10px">
         <div class="modal-header title-modal b-h-12 justify-content-center mb-2" style="border-bottom: none !important; margin: -10px;">
            <h5 class="modal-title" id="exampleModalLabel">              
               Tambah Data Produk              
            </h5>            
         </div>
         <div class="modal-body">             
            <form action="pages/produk/prosesinputproduk.php" method="POST" enctype="multipart/form-data">
               <div class="form-group">  
                  <label class="lblInput" for="kodeproduk">Kode Produk</label>
                  <input type="text" name="kodeproduk" id="kodeproduk" value="<?php echo $kodeproduk; ?>" class="form-control b-20" readonly>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="namaproduk">Nama Produk</label>
                  <input type="text" name="namaproduk" id="namaproduk" class="form-control b-20" placeholder="Enter Product Name..." autofocus required>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="hargaproduk">Harga</label>
                  <input type="number" name="hargaproduk" id="hargaproduk" class="form-control b-20" placeholder="Enter Price ..." required>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="idkategori">Kategori</label>
                  <select name="idkategori" id="idkategori" class="form-control custom-select b-20" required>
                     <option value="" >~ Select Category ~</option>
                     <?php
                        $select_kategory = mysqli_query($kon, 'SELECT * FROM kategori');
                        while ($data = mysqli_fetch_array($select_kategory)) {
                           echo "
                              <option value='$data[idkategori]'>
                                 $data[namakategori]
                              </option>                              
                           ";
                        }
                     ?>
                  </select>
               </div>
               <div class="form-group">
                  <label class="lblInput" for="fotoproduk">Foto</label>
                  <input type="file" name="fotoproduk" id="fotoproduk" accept="image/*" class="form-control b-20" multiple />
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