<?php

   session_start();
   unset($_SESSION["namapengguna"]);
   unset($_SESSION["teleponpengguna"]);
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   session_unset();
   session_destroy();
   header ('location:index.php?err=2')

?>