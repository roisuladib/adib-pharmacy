<?php 
   $idpengguna    = $_GET['id'];
   $queryTampung  = mysqli_query($kon, "SELECT * FROM pengguna WHERE idpengguna = '$idpengguna'");
   $data          = mysqli_fetch_array($queryTampung);
?>
<div class="card shadow b-20 mb-4">
   <div class="card-header b-h-20 py-3">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-user-edit"></i>
         Edit Akun
         <span class="b-20" style="background: #ff5c84; color: #ffffff">
            &nbsp;
               <?php echo $data['namapengguna']; ?>
            &nbsp;
         </span>
      </h6>
   </div>
   <div class="card-body">      
      <form action="pages/user/proseseditpengguna.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <input type="text" class="form-control b-20 pl-3" name="namapengguna" id="namapengguna" value="<?php echo $data['namapengguna'];?>" placeholder="Nama pengguna" title="Masukan nama baru anda" autofocus required />            
         </div>
         <div class="form-group">
            <input type="text" class="form-control b-20 pl-3" name="username" id="username" value="<?php echo $data['username'];?>" placeholder="Enter new password" title="Hanya Admin yang bisa ubah username" disabled />            
         </div>
         <div class="form-group">
            <input type="password" class="form-control b-20 pl-3" name="password" id="password" placeholder="Enter new password" title="Masukan password baru anda" />
         </div>              
         <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg,image/jpg" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
            <label class="custom-file-label b-20 pl-3" for="inputGroupFile03">Choose file</label>
         </div>         
         <input type="hidden" name="id" id="id" value="<?php echo $data['idpengguna']; ?>">
         <input type="hidden" name="username" id="username" value="<?php echo $data['username']; ?>">
         <button type="submite" name="submite" class="btn btn-block mt-4 btn-sape">
            Edit
         </button>    
      </form>      
   </div>
</div>