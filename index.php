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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Busca Preço</title>
  </head>

  <body>
    <?php
      echo ($userData) ? (
        '<a href="logout.php">Logout</a>'
      ) : (<<<END
        <form action="login.php" method="POST">
          <label for="username">Usuário</label>
          <input id="username" name="username" type="text"/>
          <br/>
          <label for="password">Senha</label>
          <input 
            id="password" 
            name="password" 
            type="password"
            maxlength="10"
          />
          <br/>
          <input type="submit"/>
        </form>
        END
      );
    ?>
    
    
    <hr/>
    <?php content()?>
  </body>
</html>
