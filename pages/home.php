<?php require_once 'connection.php';?>

<?php

  if (isset($_POST['ean_code']) && !empty($_POST['ean_code'])) {
    $query = "SELECT * FROM `products` WHERE `ean_code` = '".
      $_POST['ean_code']
    ."';";

    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    while ($row = mysqli_fetch_assoc($response)) {
      $data[] = $row;
    }
  } else {
    $query = "SELECT * FROM `products`;";
  
    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    $data = array();
  
    while ($row = mysqli_fetch_assoc($response)) {
      $data[] = $row;
    }
  }

  $searchField = 'ean_code';

?>

<?php include_once 'components/searchbar.php';?>

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
