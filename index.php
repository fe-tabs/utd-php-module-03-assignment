<?php

  require_once 'connection.php';

  $query = "SELECT * FROM `products`;";

  $response = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $data = array();

  while ($row = mysqli_fetch_assoc($response)) {
    $data[] = $row;
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Busca Preço</title>
  </head>

  <body>
    <table>
      <thead>
        <th>Descrição</th>
        <th>Código de Barras</th>
        <th>Preço de Varejo</th>
        <th>Preço de Atacado</th>
        <th>Detalhes</th>
        <th>Seção</th>
      </thead>
      <tbody>
        <?php foreach ($data as $product) : ?>
          <tr>
            <td><?= $product['description']; ?></td>
            <td><?= $product['ean_code']; ?></td>
            <td><?= $product['retail_price']; ?></td>
            <td><?= $product['wholesale_price']; ?></td>
            <td><?= $product['details']; ?></td>
            <td><?= $product['section']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>