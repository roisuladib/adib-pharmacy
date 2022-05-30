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
      <form action="proseseditpengguna.php" method="post" enctype="multipart/form-data">
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
         <button type="submite" name="submite" class="btn btn-primary btn-user btn-block mt-4 b-20" style="background: #03ac0e">
            Edit
         </button>    
      </form>      
   </div>
</div>