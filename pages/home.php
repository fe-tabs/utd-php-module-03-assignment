<?php

  include_once 'modules/products/products.php';

  if (isset($_POST['ean_code']) && !empty($_POST['ean_code'])) {
    $response = listOne($conn, 'ean_code', $_POST['ean_code']);
  
    while ($row = mysqli_fetch_assoc($response)) {
      $data[] = $row;
    }
  } else {
    $response = listAll($conn);

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

  foreach ($data as $row) {
    $tableData[] = array_slice($row, 1);
  }

  for ($i=0; $i < count($tableData); $i++) { 
    $tableData[$i]['retail_price'] = 'R$ '.$tableData[$i]['retail_price'];
    $tableData[$i]['wholesale_price'] = 'R$ '.$tableData[$i]['wholesale_price'];
  }

?>

<?php include_once 'components/searchbar.php';?>

<?php include_once 'components/table.php';?>
