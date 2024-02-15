<?php

  $userData = array();

  session_start();

  if (isset($_SESSION[base64_encode('user_data')])) {
    $userData = $_SESSION[base64_encode('user_data')];
  }

  include_once 'content.php';

?>

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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand ps-3" href="index.php">
        Busca Preço
      </a>

      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
      </button>

      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
          <input 
            class="form-control" 
            type="text" 
            placeholder="Buscar por..." 
            aria-label="Buscar por..."
            aria-describedby="btnNavbarSearch" 
          />

          <button 
            id="btnNavbarSearch"
            class="btn btn-primary" 
            type="submit"
          >
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>

      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a href="#"
            id="navbarDropdown" 
            class="nav-link dropdown-toggle" 
            role="button" 
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-user fa-fw"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <?php
                echo ($userData) ? (
                  <<<END
                  <a class="dropdown-item" href="logout.php">
                    Sair
                  </a>
                  END
                ) : (
                  <<<END
                  <form action="login.php" method="POST" class="m-3">
                    <label for="username">Usuário</label>
                    <input id="username" name="username" type="text"/>
                    <br/>
                    <label for="password" class="mt-3" >Senha</label>
                    <input 
                      id="password" 
                      name="password" 
                      type="password"
                      maxlength="10"
                    />
                    <br/>
                    <input class="mt-3" value="Entrar" type="submit"/>
                  </form>
                  END
                );
              ?>
              
            </li>
          </ul>
        </li>
      </ul>
    </nav>

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
