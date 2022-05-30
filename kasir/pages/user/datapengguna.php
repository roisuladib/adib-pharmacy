<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <h6 class="m-0 font-weight-bold text-primary">  
         <i class="fas fa-users fa-table"></i>
         Data Pengguna         
      </h6>
   </div>      
   <div class="card-body">     
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
                  $username      = $_SESSION['username'];
                  $query         = mysqli_query($kon, "SELECT * FROM pengguna WHERE username = '$username'");
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
                     <td align="center">
                        <!-- <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-warning btn-circle" title="Silahkan <?php echo $_SESSION['namapengguna']; ?> Edit Akunnya">
                           <i class="fas fa-pencil-alt"></i>
                        </button> -->
                        <a href="index.php?halaman=edit-data-pengguna&id=<?php echo $data['idpengguna']; ?>" class="btn btn-warning btn-circle" title="Silahkan <?php echo $_SESSION['namapengguna']; ?> Edit Akunnya">
                           <i class="fas fa-pencil-alt"></i>
                        </a>
                        <!-- <a href="proseshapuspengguna.php?id=<?php echo $data['idpengguna']; ?>" onClick="return confirm('Apakah <?php echo $_SESSION['namapengguna'];?> yakin mengapus Akun <?php echo $data['username'];?>')" class="btn btn-danger btn-circle">
                           <i class="fas fa-trash-alt"></i>
                        </a> -->
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

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
               Edit Akun               
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="card-body">      
               <form action="pages/user/proseseditpengguna.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <input type="text" class="form-control b-20 pl-3" name="namapengguna" id="namapengguna" value="<?php echo $data['namapengguna'];?>" placeholder="Nama pengguna" title="Masukan nama baru anda" required />            
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control b-20 pl-3" name="username" id="username" value="<?php echo $data['username'];?>" placeholder="Enter new password" title="Hanya Admin yang bisa ubah username" disabled />            
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control b-20 pl-3" name="password" id="password" placeholder="Enter new password" title="Masukan password baru anda" />
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $data['idpengguna']; ?>">
                  <input type="hidden" name="username" id="username" value="<?php echo $data['username']; ?>">
                  <button type="submite" name="submite" class="btn btn-block mt-4 btn-sape">
                     Edit
                  </button>    
               </form>      
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>
<!-- End Modal Edit Data -->