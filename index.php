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
    <form action="#" method="POST">
      <label for="description">Descrição</label>
      <input id="description" name="description" type="text"/>
      <br/>
      <label for="ean_code">Código de Barras</label>
      <input id="ean_code" name="ean_code" type="text"/>
      <br/>
      <label for="retail_price">Preço de Varejo</label>
      <input 
        id="retail_price" 
        name="retail_price" 
        type="number"
        step=".01"
        min=".01"
        max="99999.99"
        value=".01"
      />
      <br/>
      <label for="wholesale_price">Preço de Atacado</label>
      <input 
        id="wholesale_price" 
        name="wholesale_price" 
        type="number"
        step=".01"
        min=".01"
        max="99999.99"
        value=".01"
      />
      <br/>
      <label for="details">Detalhes</label>
      <textarea
        id="details"
        name="details"
        maxlength="500"
      >
      </textarea>
      <br/>
      <label for="section">Seção</label>
      <input id="section" name="section" type="text"/>

      <input type="submit"/>
    </form>

    <hr/>

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

<?php

  if (isset($_POST['description']) && !empty($_POST['description'])) {
    $fields = implode("`, `", array_keys($_POST));
    $values = implode("', '", $_POST);

    $query = "INSERT INTO `products` (`$fields`) VALUES ('$values')";

    $reponse = mysqli_query($conn, $query) or die(mysqli_error($conn));
  }

?>