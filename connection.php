<?php

  $server = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'utd_php_module3';

  $conn = mysqli_connect(
    $server,
    $user,
    $password,
    $database
  ) or die(mysqli_connect_error());
  
?>