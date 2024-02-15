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

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  </head>

  <body class="sb-nav-fixed">
    <?php include_once 'components/topbar.php';?>

    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">
                NAVEGAÇÃO
              </div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Início
              </a>

              <div class="sb-sidenav-menu-heading">
                GERENCIAMENTO
              </div>
              <a class="nav-link" href="?page=admin">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-table"></i>
                </div>
                Gerenciar Produtos
              </a>
            </div>
          </div>

          <?php
            echo ($userData) ? (
              <<<END
              <div class="sb-sidenav-footer">
                <div class="small">Logado como:</div>
              END.$userData["username"].
              <<<END
              </div>
              END
            ) : '';
          ?>
        </nav>
      </div>
      
      <div id="layoutSidenav_content">
        <?php content()?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

  </body>
</html>
