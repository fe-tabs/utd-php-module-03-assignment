<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand ps-3" href="index.php">
    Busca Preço
  </a>

  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
    <i class="fas fa-bars"></i>
  </button>

  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
      <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
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
              <form action="login.php" method="POST" class="m-3" style="min-width: 220px">
                <h5 class="font-weight-light my-2">
                  Acesso Administrativo
                </h5>
                <div class="input-group">
                  <label
                  for="username"
                  class="input-group-text"
                  style="min-width: 80px"
                  >
                    Usuário
                  </label>
                  <input
                    id="username"
                    class="form-control"
                    name="username" 
                    type="text"
                  />
                </div>
                <div class="input-group mt-2">
                  <label 
                    for="password" 
                    class="input-group-text" 
                    style="min-width: 80px"
                  >
                    Senha
                  </label>
                  <input 
                    id="password" 
                    class="form-control"
                    name="password" 
                    type="password"
                    maxlength="10"
                  />
                </div>
                <input class="btn btn-primary mt-2" value="Entrar" type="submit"/>
              </form>
              END
            );
          ?>
        </li>
      </ul>
    </li>
  </ul>
</nav>