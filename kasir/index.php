<?php
  
  include ("../koneksi.php");

   session_start();
      if (!$_SESSION["username"]) {
         header('location: ../index.php?err=1');
         exit;
      } 
   // else {
   //    echo
   //       $_SESSION["namapengguna"].'<br />'.
   //       $_SESSION["teleponpengguna"].'<br />'.   
   //       $_SESSION["username"].'<br />'.
   //       $_SESSION["hakakses"].'<br />';   
   //          echo "
   //             <a href='../keluar.php'>
   //                Keluar
   //             </a>
   //          "; 
   // }
   
?>

<!DOCTYPE html >
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
   <meta name="description" content="Sistem Informasi ADIB RESTO" />
   <meta name="author" content="Muhammad Roisul Adib" />
   <title>Adib Pharmacy | KASIR By <?php echo $_SESSION['namapengguna']; ?> </title>
   <link rel="shortcut icon" href="../images/icons/myicon.ico" type="image/x-icon" />
   <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />   
   <link rel="stylesheet" href="../css/sb-admin-2.min.css">
   <link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css" />   
   <link rel="stylesheet" href="../css/util.css" type="text/css" />
   <link rel="stylesheet" href="style/style_kasir.css" />   
</head>
<body id="page-top">
   <div id="wrapper">
      <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #4b42ad">         
         <a href="index.php" class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-laptop-medical"></i>               
            </div>
            <div class="sidebar-brand-text mx-3">
               ADIB PHARMACY
            </div>
         </a>      
         <hr class="sidebar-divider my-0" />
         <li class="nav-item">
            <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-home"></i>   
               <span>Home</span>
            </a>
         </li>      
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=data-pengguna">
               <i class="fas fa-user-tie fa-table"></i>
               <span>Users</span>
            </a>
         </li> 
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=data-kategori">
               <i class="fas fa-mortar-pestle"></i>              
               <span>Categories</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=data-produk">
               <i class="fas fa-cube"></i>               
               <span>Products</span>
            </a>
         </li> 
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=data-meja">
               <i class="fas fa-chair"></i>               
               <span>Tables</span>
            </a>
         </li> 
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=data-transaksi">
               <i class="fas fa-dollar-sign"></i>               
               <span>Transactions</span>
            </a>
         </li> 
         <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=laporan-transaksi">
               <i class="fas fa-file-invoice-dollar"></i>               
               <span>Reports</span>
            </a>
         </li> 
         <hr class="sidebar-divider d-none d-md-block">
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>      

      <div class="d-flex flex-column" id="content-wrapper">
         <div id="content">
             <nav class="navbar navbar-expand navbar-light bg-light bg-white topbar mb-4 static-top shadow">             
               <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                  <i class="fa fa-bars"></i>
               </button>
               <form action="search.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">                     
                     <input type="text" name="search" id="search" placeholder="Search for ..." aria-label="Search" aria-describedby="basic-addon2" class="form-control bg-light border-1 small" style="border-radius: 20px 0px 0px 20px;">                                      
                     <div class="input-group-append">
                        <button class="btn btn-primary box-shadow-none border-none" type="button" style="border-radius: 0px 20px 20px 0px; background: #4b42ad">
                           <i class="fas fa-search fa-sm"></i>
                        </button>
                     </div>
                  </div>                  
               </form>                                              
               <ul class="navbar-nav ml-auto">
                  <div class="topbar-divider d-none d-sm-block"></div>
                  <li class="nav-item dropdown no-arrow">
                     <a href="" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600">
                           <?php
                              echo $_SESSION['namapengguna'];
                           ?>
                        </span>
                        <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['namapengguna'];?>" title="Lihat profil <?php echo $_SESSION['namapengguna'];?> " />
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="border-radius: 20px;">
                        <a href="#" class="dropdown-item" style="border-radius: 20px;">
                           <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                           <?php echo $_SESSION['namapengguna']; ?>
                        </a>
                        <a href="#" class="dropdown-item" style="border-radius: 20px;">
                           <i class="fas fa-question fa-sm fa-fw mr-2 text-gray-400"></i>
                           <?php echo $_SESSION['hakakses']; ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="border-radius: 20px;">
                           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout                              
                        </a>
                     </div>
                  </li>
               </ul>
            </nav>

            <div class="container-fluid">
               <?php
                  if (!isset($_GET['halaman'])) {
                     include('home.php');
                  }
                  else if ($_GET['halaman']=='data-pengguna') {
                     include('pages/user/datapengguna.php');
                  }
                  else if ($_GET['halaman']=='edit-data-pengguna') {
                     include('pages/user/editdatapengguna.php');
                  }
                  else if ($_GET['halaman']=='data-kategori') {
                     include('pages/kategori/datakategori.php');
                  } 
                  else if ($_GET['halaman']=='edit-data-kategori') {
                     include('pages/kategori/editdatakategori.php');
                  }                     
                  else if ($_GET['halaman']=='data-produk') {
                     include('pages/produk/dataproduk.php');
                  }                      
                  else if ($_GET['halaman']=='edit-data-produk') {
                     include('pages/produk/editdataproduk.php');
                  }                                                      
                  else if ($_GET['halaman']=='data-meja') {
                     include('pages/meja/datameja.php');
                  }                                                      
                  else if ($_GET['halaman']=='edit-data-meja') {
                     include('pages/meja/editdatameja.php');
                  }  
                  else if ($_GET['halaman']=='data-transaksi') {
                     include('pages/transaksi/datatransaksi.php');
                  }                                                      
                  else if ($_GET['halaman']=='input-data-transaksi') {
                     include('pages/transaksi/inputdatatransaksi.php');
                  }                                                                                                                          
                  else if ($_GET['halaman']=='detail-transaksi') {
                     include('pages/transaksi/detailtransaksi.php');
                  }                                                                                                                          
                  else if ($_GET['halaman']=='edit-data-transaksi') {
                     include('pages/transaksi/editdatatransaksi.php');
                  }                                                                                                                          
                  else if ($_GET['halaman']=='laporan-transaksi') {
                     include('pages/laporan/laporantransaksi.php');
                  }                                                                                                                        
               ?>
            </div>            
         </div>     
               
         <footer class="m-t-120">
            <div class="waves">
               <div class="wave" id="wave1"></div>
               <div class="wave" id="wave2"></div>
               <div class="wave" id="wave3"></div>
               <div class="wave" id="wave4"></div>
            </div>    
            <ul class="social_icon">
               <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="call-outline"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>               
               <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
            </ul>                 
            <p>
               Copyright &copy; Adib Pharmacy 2021
            </p>
         </footer>         
      </div>
   </div>

   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>

   <!-- Modal logout-->
   <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content modal-custom-remove">
            <div class="modal-header justify-content-center">
               <h5 class="modal-title" id="exampleModalLabel">Apakah <b><?php echo $_SESSION['namapengguna']; ?></b> yakin ingin Logout ?</h5>                                                
            </div>                                                       
            <div class="modal-footer justify-content-center">
               <button type="button" class="btn btn-secondary b-20" data-dismiss="modal">Cancel</button>
               <a class="btn btnMyPro" style="background: #03ac0e !important;" href="../keluar.php">Logout</a>                                               
            </div>
         </div>
      </div>
   </div>

   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="../js/sb-admin-2.min.js"></script>
   <script src="../vendor/chart.js/Chart.min.js"></script>
   <script src="../js/demo/chart-area-demo.js"></script>
   <script src="../js/demo/chart-pie-demo.js"></script>
   <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="../js/demo/datatables-demo.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>        
   <script>
      var url = window.location;
      $('ul.sidebar a').filter(function() {
         return this.href == url;
      }).parent().addClass('active');
      // $('ul.treeview a').filter(function() {  
      //    return this.href == url;  
      // }).parentsUntil(".sidebar > .treeview-menu").addClass('active');               
   </script>   

   <!-- Pilih Produk -->
   <script>
      $(document).ready(function(){
         $('#idproduk').change(function() {
            const idproduk = $('#idproduk').val();
            $.ajax({
               type: 'get',
               url: 'pages/transaksi/ajax-barang-cari.php',
               data: 'idproduk=' + idproduk,
               dataType: 'json',
               success: function(data) {
                  const harga = data[4];
                  $('#hargaproduk').val(harga);
                  $('#jumlahtransaksi').focus();
               }
            });
         });
      });
   </script>
   <!-- Enable Tombol -->
   <script>
      $(document).ready(function() {
         $('#jumlahtransaksi').keyup(function() {
            if ($('#jumlahtransaksi').val() > 0) {
               $('#submit').removeAttr('disabled');
            }
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $('#idmeja').change(function() {
            $('#transaksisubmit').removeAttr('disabled');
         });
      });
   </script>
</body>
</html>