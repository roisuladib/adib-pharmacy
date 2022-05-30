<div class="card shadow mb-4 b-20">
   <div class="card-header py-3 b-h-20">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-pencil-alt"></i>
         Edit Kategori
      </h6>
   </div>
   <div class="card-body">
      <?php
         $id                  = $_GET['id'];
         $query               = mysqli_query($kon, "SELECT * FROM kategori WHERE idkategori = '$id'");
         $data                = mysqli_fetch_array($query);
      ?>
      <form action="pages/kategori/proseseditkategori.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" id="id" value="<?php echo $data['idkategori']; ?>" />
         <div class="form-group">
            <input type="text" name="namakategori" id="namaketegori" value="<?php echo $data['namakategori']; ?>"placeholder="Enter New Category Name" class="form-control b-20" autofocus required />
         </div>
         <div class="form-group">
            <input type="text" name="keterangan" id="keterangan" value="<?php echo $data['keterangan']; ?>"placeholder="Enter New Keterangan" class="form-control b-20" required />
         </div>
         <button type="submit" name="submite" class="btn btn-block btn-sape">Ubah</button>
      </form>
   </div>
</div>