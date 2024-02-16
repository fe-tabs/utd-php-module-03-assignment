<?php

  include_once 'modules/products/products.php';

  if (!isset($_SESSION[base64_encode('user_data')])) {
    header("location: index.php");;
  }

  if(isset($_POST['action']) && !empty($_POST['action'])) {
    if($_POST['action'] == 'insert') {
      unset($_POST['action']);
      insert($conn);
    } elseif($_POST['action'] == 'update') {
      unset($_POST['action']);
      update($conn);
    }
  }

  if(isset($_GET['delete'])) {
    delete($conn);
  }

  $updateData = false;

  if(isset($_GET['update'])) {
    $response = listOne($conn, 'id', $_GET['update']);

    $updateData = array();

    while ($row = mysqli_fetch_assoc($response)) {
      $updateData = $row;
    }
  }

  $response = listAll($conn);

  $data = array();

  while ($row = mysqli_fetch_assoc($response)) {
    $data[] = $row;
  }

  $tableColumns = [
    'Descrição',
    'Código de Barras',
    'Preço de Varejo',
    'Preço de Atacado',
    'Detalhes',
    'Seção',
    'Ações'
  ];
  $tableData = array();
  $tableDataIds = array();

  foreach ($data as $row) {
    $tableDataIds[] = array_slice($row, 0, 1);
    $tableData[] = array_slice($row, 1);
  }

  for ($i=0; $i < count($tableData); $i++) { 
    $tableData[$i]['action'] = <<<END
    <a href="?page=admin&update=
    END.$tableDataIds[$i]['id'].'">'.<<<END
      Editar
    </a>

    <a href="?page=admin&delete=
    END.$tableDataIds[$i]['id'].'">'.<<<END
      Excluir
    </a>
    END;
  }

?>

<form action="#" method="POST">
  <input 
    id="action"
    name="action"
    type="hidden" 
    value="<?=($updateData) ? 'update' : 'insert'?>"
  />

  <label for="description">Descrição</label>
  <input 
    id="description" 
    name="description" 
    type="text"
    value="<?=($updateData) ? $updateData['description'] : '';?>"
  />
  <br/>
  <label for="ean_code">Código de Barras</label>
  <input
    id="ean_code"
    name="ean_code"
    type="text"
    value="<?=($updateData) ? $updateData['ean_code'] : '';?>"
  />
  <br/>
  <label for="retail_price">Preço de Varejo</label>
  <input 
    id="retail_price" 
    name="retail_price" 
    type="number"
    step="0.01"
    min="0.01"
    max="99999.99"
    value="<?=($updateData) ? $updateData['retail_price'] : 0.1;?>"
  />
  <br/>
  <label for="wholesale_price">Preço de Atacado</label>
  <input 
    id="wholesale_price" 
    name="wholesale_price" 
    type="number"
    step="0.01"
    min="0.01"
    max="99999.99"
    value="<?=($updateData) ? $updateData['wholesale_price'] : 0.1;?>"
  />
  <br/>
  <label for="details">Detalhes</label>
  <textarea
    id="details"
    name="details"
    maxlength="500"
  >
    <?=($updateData) ? $updateData['details'] : '';?>
  </textarea>
  <br/>
  <label for="section">Seção</label>
  <input 
    id="section" 
    name="section" 
    type="text"
    value="<?=($updateData) ? $updateData['section'] : '';?>"
  />

  <input type="submit"/>
</form>

<hr/>

<?php include_once 'components/table.php';?>
