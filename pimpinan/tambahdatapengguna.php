<div class="card shadow mb-4 b-20">
   <div class="card-header b-h-20  py-3">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-user-plus"></i>
         Create User Account
      </h6>
   </div>
   <div class="card-body">      
      <form action="prosestambahpengguna.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <input type="text" class="form-control b-20 pl-3" name="namapengguna" id="namapengguna" placeholder="Enter nama user" required />
         </div>
         <div class="form-group">            
            <input type="number" class="form-control b-20 pl-3" name="teleponpengguna" id="teleponpengguna" placeholder="Enter telephone" required />            
         </div>
         <div class="form-group">
            <input type="text" class="form-control b-20 pl-3" name="username" id="username" placeholder="Enter username" required />            
         </div>  
         <div class="form-group">
            <input type="password" class="form-control b-20 pl-3" name="password" id="password" placeholder="Enter password" required />            
         </div>                
         <div class="form-group">
            <select class="form-control b-20 pl-3 custom-select" name="hakakses" id="hakakses">               
               <option value="Aktif" selected>Aktif</option>
               <option value="Non aktif">Non aktif</option>
            </select>            
         </div>         
         <input type="hidden" name="hakakses" id="hakakses" value="Kasir">         
         <button type="submite" name="submite" class="btn btn-primary btn-user btn-block mt-4 b-20" style="background: #03ac0e">
            Create
         </button>    
      </form>      
   </div>
</div>