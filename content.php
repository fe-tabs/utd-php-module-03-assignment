<?php

  function content() {
    if(!isset($_GET['page'])) {
      include_once 'pages/home.php';
    } else {
      switch ($_GET['page']) {
        case "admin":
          include_once 'pages/admin.php';
          break;
      }
    }
  }

?>