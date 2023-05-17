<?php

   $connect = mysqli_connect('localhost', 'root', '', 'test_only');

   if (!$connect) {
      die('Error to connect to DB');
   } else {
      "Получилось";
   }

?>