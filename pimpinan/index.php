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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <meta name="description" content="Sistem Informasi ADIB RESTO">
   <meta name="author" content="Muhammad Roisul Adib">
   <title>Adib Resto | Pimpinan </title>
   <link rel="shortcut icon" href="../images/icons/favicon.ico" type="image/x-icon">
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">   
   <link href="../css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <style>
      .b-20 {
         border-radius: 20px !important;
      }
      .b-h-20 {
         border-radius: 20px 20px 0px 0px !important;
      }
      .dataTables_filter input {
         border-radius: 20px !important;         
      }      
      .myAnimasi {
         position: relative;
         width: auto;
         height: 300px;
         display: flex;
         justify-content: center;
         align-items: center;

      }
      .myAnimasi:before {
         content: '';
         position: absolute;
         width: 18px;
         height: 100%;
         background: linear-gradient(#00ccff, #d400d4);
         animation: animate 5s linear infinite;
      }
      @keyframes animate {
         0% {
            transform: rotate(0deg);
         }
         100% {
            transform: rotate(360deg);
         }
      }
      .myAnimasi input {
         z-index: 10;
      }
   </style>
</head>
<body id="page-top">
   
   <!-- Page Wrapper -->
   <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #0e0b1f">
         <!-- Sidebar Brand -->
         <a href="index.php" class="sidebar-brand d-flex align-items-center justify-content-center" title="Dashboard <?php echo $_SESSION['hakakses']; ?>">
            <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-fish"></i>               
            </div>
            <div class="sidebar-brand-text mx-3">
               ADIB RESTO
            </div>
         </a>      
         <hr class="sidebar-divider my-0" />

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active" title="Halaman Home <?php echo $_SESSION['hakakses']; ?>">
            <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
            </a>
         </li>      
         <li class="nav-item" title="Halaman Data User">
            <a class="nav-link" href="index.php?halaman=data-pengguna">
               <i class="fas fa-user-tie fa-table"></i>
               <span>Users</span>
            </a>
         </li> 
         <li class="nav-item" title="Halaman Data User">
            <a class="nav-link" href="index.php?halaman=data-transaksi">
               <i class="fas fa-user-tie fa-table"></i>
               <span>Transactions</span>
            </a>
         </li> 
         <li class="nav-item" title="Halaman Data User">
            <a class="nav-link" href="index.php?halaman=data-laporan">
               <i class="fas fa-user-tie fa-table"></i>
               <span>Reports</span>
            </a>
         </li> 
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Sidebar Toggler -->
         <div class="text-center d-none d-md-inline" title="Perkecil">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>
      <!-- End Sidebar -->

      <!-- Content Wrapper -->
      <div class="d-flex flex-column" id="content-wrapper">

         <!-- Main Content -->
         <div id="content">
            <!-- Navigasi -->
             <nav class="navbar navbar-expand navbar-light bg-light bg-white topbar mb-4 static-top shadow">
               <!-- Toggle Topbar -->               
               <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                  <i class="fa fa-bars"></i>
               </button>
               <!-- Topbar Search -->
               <form action="search.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">                     
                     <input type="text" name="search" id="search" placeholder="Search for ..." aria-label="Search" aria-describedby="basic-addon2" class="form-control bg-light border-1 small" style="border-radius: 20px 0px 0px 20px;" title="Masukan kata pencarian">                                      
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="button" style="border-radius: 0px 20px 20px 0px; background: #0e0b1f" title="Cari data">
                           <i class="fas fa-search fa-sm"></i>
                        </button>
                     </div>
                  </div>                  
               </form>

               <ul class="navbar-nav ml-auto">
                  <div class="topbar-divider d-none d-sm-block"></div>
                  <li class="nav-item dropdown no-arrow">
                     <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600">
                           <?php
                              echo $_SESSION['namapengguna'];
                           ?>
                        </span>
                        <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['namapengguna'];?>" />
                     </a>
                     <!-- Dropdown - User Information -->
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

            <!-- halaman -->
            <div class="container-fluid">
               <?php
                  if (!isset($_GET['halaman'])) {
                     include('home.php');
                  }
                  else if ($_GET['halaman']=='data-pengguna') {
                     include('datapengguna.php');
                  }
                  else if ($_GET['halaman']=='tambahdatapengguna') {
                     include('tambahdatapengguna.php');
                  } 
                  else if ($_GET['halaman']=='editdatapengguna') {
                     include('editdatapengguna.php');
                  }                                  
                  else if ($_GET['halaman']=='hapusdatapengguna') {
                     include('hapusdatapengguna.php');
                  } 
                  else if ($_GET['halaman']=='data-transaksi') {
                     include('datatransaksi.php');
                  } 
                  else if ($_GET['halaman']=='detail-transaksi') {
                     include('detailtransaksi.php');
                  } 
                  else if ($_GET['halaman']=='data-laporan') {
                     include('datalaporan.php');
                  } 
               ?>
            </div>            
         </div>           
         <!-- Footer -->
         <footer class="sticky-footer bg-white shadow">
            <div class="container my-auto">
               <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Adib Resto 2021</span>
               </div>
            </div>
         </footer>
      </div>
   </div>

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>

   <!-- Modal logout-->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content modal-custom-remove">
              <div class="modal-header justify-content-center">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah <b><?php echo $_SESSION['namapengguna']; ?></b> yakin ingin Logout ?</h5>                                                
              </div>                                                       
              <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" style="background: #03ac0e !important;" href="../keluar.php">Logout</a>                                               
              </div>
          </div>
      </div>
  </div>
  <!-- End Modal logout -->

   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- Custom scripts for all pages-->
   <script src="../js/sb-admin-2.min.js"></script>
   <!-- Page level plugins -->
   <script src="../vendor/chart.js/Chart.min.js"></script>
   <!-- Page level custom scripts -->
   <script src="../js/demo/chart-area-demo.js"></script>
   <script src="../js/demo/chart-pie-demo.js"></script>
   <!-- Page level plugins -->
   <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <!-- Page level custom scripts -->
   <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>