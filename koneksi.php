<?php

   $server   = 'localhost';
   $username = 'root';
   $password = 'root';
   $database = 'restodb';

   $kon = mysqli_connect($server, $username, $password, $database);

   if (!$kon)
      die("Connection failed: " . mysqli_connect_error());

?>