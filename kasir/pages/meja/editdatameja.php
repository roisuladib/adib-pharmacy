<?php

   include ('../koneksi.php');
   $idmeja       = $_GET['id'];
   $query_meja   = mysqli_query($kon, "SELECT * FROM meja WHERE idmeja = '$idmeja' ");
   $data           = mysqli_fetch_array($query_meja);
  
?>

<div class="card shadow mb-4 b-20">
   <div class="card-header py-3 b-h-20">
      <div class="m-0 font-weight-bold text-primary">
         <i class="fas fa-pencil-alt"></i>
         Edit Data Meja
      </div>
   </div>
   <div class="card-body">
      <form action="pages/meja/proseseditmeja.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" id="id" value='<?= $data['idmeja']; ?>' />
         <div class="form-group">
            <label class="lblInput" for="nomormeja">Kode Meja</label>
            <input type="text" name="nomormeja" id="nomormeja" value="<?= $data['nomormeja']; ?>" class="form-control b-20" placeholder="Enter meja code..." readonly>
         </div>
         <div class="form-group">
            <label class="lblInput" for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" value="<?= $data['keterangan']; ?>" class="form-control b-20" placeholder="Enter meja name..." autofocus required>
         </div>
         <button type="submit" class="btn btn-block btn-sape mb-3 mt-4 box-shadow-none">Edit</button>         
      </form>  
   </div>
</div>