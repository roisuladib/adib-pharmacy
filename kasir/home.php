<div class="card shadow mb-4 b-20">
   <div class="card-header py-3 b-h-20">
      <h6 class="m-0 font-weight-bold text-primary">
         <i class="fas fa-door-open"></i>
         <?php echo strtoupper($_SESSION['hakakses']);?> Area
      </h6>
   </div>
   <div class="card-body">
      <p> Selamat Datang
         <strog class="b-20" style="background: #7bed9f; color: #000000">
            &nbsp;   
               <?php echo $_SESSION['namapengguna'];?>
            &nbsp;
         </strog>         
      </p>
   </div>
</div>
<div class="row">

   <?php

      // Total income
      $transaction_total = mysqli_query($kon, 'SELECT SUM(totalharga) AS totalharga FROM transaksi');
      $transactions      = mysqli_fetch_array($transaction_total);

      // Monthly income
      $current_year = date('Y');
      $month        = date('m');
      $transaction_months = mysqli_query($kon, "SELECT tanggaltransaksi, SUM(totalharga) AS totalharga FROM transaksi WHERE YEAR(tanggaltransaksi)='$current_year' && MONTH(tanggaltransaksi)='$month'");
      $data_months        = mysqli_fetch_array($transaction_months);
      
      // Today income
      $today = date('Y-m-d');
      $transaction_todays = mysqli_query($kon, "SELECT tanggaltransaksi, SUM(totalharga) AS totalharga FROM transaksi WHERE tanggaltransaksi = '$today'");
      $data_todays        = mysqli_fetch_array($transaction_todays);

      // Transaction amount today
      $transaction_amount = mysqli_query($kon, "SELECT * FROM transaksi WHERE tanggaltransaksi = '$today'");
      $data_amount        = mysqli_num_rows($transaction_amount);

   ?>

   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
         <a href="#" style="text-decoration: none">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Income
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp. <?= number_format($transactions['totalharga'],'0',',','.') ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-hotel fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
         <a href="#" style="text-decoration: none">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Monthly Income
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp. <?= number_format($data_months['totalharga'],'0',',','.'); ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                     Today's Income
                  </div>
                  <div class="row no-gutters align-items-center">
                     <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                           Rp. <?= number_format($data_todays['totalharga'],'0',',','.'); ?>
                        </div>
                     </div>                                 
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-spinner fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                     Transaction Today
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <?= $data_amount; ?>
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-check fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>