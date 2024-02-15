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