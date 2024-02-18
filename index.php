<?php

  $userData = array();

  session_start();

  if (isset($_SESSION[base64_encode('user_data')])) {
    $userData = $_SESSION[base64_encode('user_data')];
  }

?>

<?php include_once 'content.php';?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Busca Preço</title>

    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/pagination.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  </head>

  <body class="sb-nav-fixed">
    <?php include_once 'components/topbar.php';?>

    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <?php include_once 'components/sidebar.php';?>
      </div>
      
      <div id="layoutSidenav_content">
        <div class="container py-3">
          <?php content()?>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/pagination.js"></script>
  </body>
</html>
