<?php require_once 'connection.php';?>

<?php

  if (isset($_POST['ean_code']) && !empty($_POST['ean_code'])) {
    $query = "SELECT 
      `description`, 
      `ean_code`,
      `retail_price`,
      `wholesale_price`,
      `details`,
      `section` 
    FROM `products` WHERE `ean_code` = '".
      $_POST['ean_code']
    ."';";

    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    while ($row = mysqli_fetch_assoc($response)) {
      $data[] = $row;
    }
  } else {
    $query = "SELECT 
      `description`, 
      `ean_code`,
      `retail_price`,
      `wholesale_price`,
      `details`,
      `section` 
    FROM `products`;";
  
    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    $data = array();
  
    while ($row = mysqli_fetch_assoc($response)) {
      $data[] = $row;
    }
  }

  $searchField = 'ean_code';
  $tableColumns = [
    'Descrição',
    'Código de Barras',
    'Preço de Varejo',
    'Preço de Atacado',
    'Detalhes',
    'Seção'
  ];
  $tableData = $data;

?>

<?php include_once 'components/searchbar.php';?>

<?php include_once 'components/table.php';?>
