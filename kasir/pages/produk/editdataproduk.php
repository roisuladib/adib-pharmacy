<?php
   include ('../koneksi.php');

   //Ambil data produk
   $idproduk       = $_GET['id'];
   $query_produk   = mysqli_query($kon, "SELECT * FROM produk WHERE idproduk = '$idproduk' ");
   $data           = mysqli_fetch_array($query_produk);

   // Ambil data kategori
   $query_category = mysqli_query($kon, "SELECT * FROM kategori WHERE idkategori = '" .$data['idkategori']. "' ");
   $datas_category = mysqli_fetch_array($query_category);   
?>

<div class="card shadow mb-4 b-20">
   <div class="card-header py-3 b-h-20">
      <div class="m-0 font-weight-bold text-primary">
         <i class="fas fa-pencil-alt"></i>
         Edit Data Produk
      </div>
   </div>
   <div class="card-body">
      <form action="pages/produk/proseseditproduk.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" id="id" value='<?= $data['idproduk']; ?>' />
         <div class="form-group">
            <label class="lblInput" for="kodeproduk">Kode Produk</label>
            <input type="text" name="kodeproduk" id="kodeproduk" value="<?= $data['kodeproduk']; ?>" class="form-control b-20" placeholder="Enter product code..." readonly>
         </div>
         <div class="form-group">
            <label class="lblInput" for="namaproduk">Nama Produk</label>
            <input type="text" name="namaproduk" id="namaproduk" value="<?= $data['namaproduk']; ?>" class="form-control b-20" placeholder="Enter Product Name..." autofocus required>
         </div>
         <div class="form-group">
            <label class="lblInput" for="hargaproduk">Harga</label>
            <input type="number" name="hargaproduk" id="hargaproduk" value="<?= $data['hargaproduk']; ?>" class="form-control b-20" placeholder="Enter Price ..." required>
         </div>
         <div class="form-group">
            <label class="lblInput" for="idkategori">Kategori</label>
            <select name="idkategori" id="idkategori" class="form-control custom-select b-20" required>
               <option value="">~ Select Category ~</option>
               <?php
                  if (!empty ($data['idkategori'])) {
                     echo "
                        <option value='$data[idkategori]' selected>
                           $datas_category[namakategori]
                        </option>
                     ";
                  }
                  $query_category = mysqli_query($kon, "SELECT * FROM kategori");
                  while ($data_category = mysqli_fetch_array($query_category)) {
                     echo "
                        <option value='$data_category[idkategori]'>
                           $data_category[namakategori]
                        </option>                              
                     ";
                  }                  
               ?>
            </select>
         </div>
         <div class="form-group">
            <label class="lblInput mr-3" for="fotoproduk">Foto</label>
            <?php
               if (!empty($data['fotoproduk'])) {
                  echo "
                     <img src='../files/$data[fotoproduk]' style='max-width: 200px; max-height: 300px;' alt='foto produk' />
                  ";                   
               }
               else {
                  echo "
                     <p class='mb-0'>Foto kosong</p>
                  ";
               }
            ?>
            <input type="file" name="fotoproduk" id="fotoproduk" accept="image/* " class="form-control b-20 mt-4" multiple />
            <input type="hidden" name="fotoproduklama" id="fotoproduklama" accept="image/*" class="form-control b-20 mt-4" value="<?= $data['fotoproduk']; ?>" multiple />
         </div>
         <button type="submit" class="btn btn-block btn-sape mb-3 mt-4 box-shadow-none">Edit</button>         
      </form>  
   </div>
</div>