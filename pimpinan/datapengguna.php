<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-users fa-table"></i>
         Data Pengguna         
      </h6>
   </div>      
   <div class="card-body">
      <a href="index.php?halaman=tambahdatapengguna" class="btn mb-3" style="background: #ff5c84; color: #fff; border-radius:20px;">
         <i class="fas fa-plus"></i> Tambah User
      </a>
      <div class="table-responsive">
         <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th width="20px">No</th>
                  <th>Nama Pengguna</th>
                  <th>Username</th>
                  <th>Hak Akses</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $no            = 0;               
                  $query         = mysqli_query($kon, "SELECT * FROM pengguna");
                  while ($data   = mysqli_fetch_array($query)) {   
                     $no++;                                    
               ?>
                  <tr>
                     <td><?php echo $no; ?></td>
                     <td><?php echo $data['namapengguna']; ?></td>
                     <td><?php echo $data['username']; ?></td>
                     <td><?php echo $data['hakakses']; ?></td>
                     <td><?php echo $data['status']; ?></td>
                     <td>
                        <?php
                           if (!empty($data['fotopengguna'])) {                                          
                        ?>
                        <img width="100px" src="../fotopengguna/<?php echo['fotopengguna']; ?>" alt="">
                        <?php
                           }    
                        ?> 
                     </td>
                     <td class="align-center">
                        <a href="index.php?halaman=editdatapengguna&id=<?php echo $data['idpengguna']; ?>" class="btn btn-warning btn-circle" title="Edit Akun <?php echo $data['namapengguna']; ?>">
                           <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="proseshapuspengguna.php?id=<?php echo $data['idpengguna']; ?>" onClick="return confirm('Apakah <?php echo $_SESSION['hakakses'];?> yakin mengapus Akun Kasir <?php echo $data['username'];?>')" title="Hapus Akun <?php echo $data['namapengguna']; ?>" class="btn btn-danger btn-circle">
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