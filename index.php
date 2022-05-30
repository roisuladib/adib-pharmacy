<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistem Informasi | Adib Pharmacy</title>
   <link rel="shortcut icon" href="images/icons/favicon.ico" type="image/x-icon">
   <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100 p-l-50 p-r-50 p-t-60 p-b-50" style="border-radius: 30px">
            <?php
               if (isset($_GET["err"])) {
                  if ($_GET["err"]==1) {
                     echo "
                        <div class='alert alert-danger text-center px-3' style='border-radius: 30px' role='alert'>
                           Rika Tidak Mempunyai Hak Akses!!
                        </div>
                     ";
                  }
                  if ($_GET["err"]==2) {
                     echo " 
                        <div class='alert alert-success text-center px-3' style='border-radius: 30px' role='alert'>
                           Rika sukses logout !!
                        </div>
                     ";
                  }
               }
            ?>

            <form class="login100-form validate-form" action="logincek.php" method="post">
               <span class="login100-form-title p-b-30" style="color: #d33f8d;">
                  ADIB PHARMACY
               </span>
               <div class="wrap-input100 validate-input m-b-16" data-validate="Username Kosong">
                  <input type="text" name="username" id="username" placeholder="Username" class="input100" style="border-radius: 30px" />
                  <span class="focus-input100" style="border-radius: 30px"></span>
                  <span class="symbol-input100">
                     <span class="lnr lnr-user"></span>
                  </span>
               </div>
               <div class="wrap-input100 validate-input m-b-16" data-validate="password is required">
                  <input type="password" name="password" id="password" placeholder="Password" class="input100" style="border-radius: 30px"/>
                  <span class="focus-input100" style="border-radius: 30px"></span>
                  <span class="symbol-input100">
                     <span class="lnr lnr-lock"></span>
                  </span>
               </div>
               <div class="container-login100-form-btn p-t-14">
                  <button class="login100-form-btn" style="border-radius: 30px">
                     Login
                  </button>
               </div>
            </form>   
         </div>
      </div>
   </div>

   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="vendor/select2/select2.min.js"></script>
   <script src="js/main.js"></script>   
</body>
</html>