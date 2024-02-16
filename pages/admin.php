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

<div class="card col-md-6 mb-3" style="font-size: 0.75rem;">
  <div class="card-header">
    <h6 class="font-weight-light my-2">
      Adicionar produto
    </h6>
  </div>
  <div class="card-body">
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
        class="form-control my-2"
        name="description" 
        type="text"
        value="<?=($updateData) ? $updateData['description'] : '';?>"
      />
    
      <label for="ean_code">Código de Barras</label>
      <input
        id="ean_code"
        class="form-control my-2"
        name="ean_code"
        type="text"
        value="<?=($updateData) ? $updateData['ean_code'] : '';?>"
      />
      <div class="row">
        <div class="col-sm-6">
          <label for="retail_price">Preço de Varejo</label>
          <input 
            id="retail_price" 
            class="form-control my-2"
            name="retail_price" 
            type="number"
            step="0.01"
            min="0.01"
            max="99999.99"
            value="<?=($updateData) ? $updateData['retail_price'] : 0.1;?>"
          />
        </div>
        
        <div class="col-sm-6">
          <label for="wholesale_price">Preço de Atacado</label>
          <input 
            id="wholesale_price" 
            name="wholesale_price" 
            class="form-control my-2"
            type="number"
            step="0.01"
            min="0.01"
            max="99999.99"
            value="<?=($updateData) ? $updateData['wholesale_price'] : 0.1;?>"
          />
        </div>
      </div>
      
      <label for="details">Detalhes</label>
      <textarea
        id="details"
        class="form-control my-2"
        name="details"
        maxlength="500"
      >
        <?=($updateData) ? $updateData['details'] : '';?>
      </textarea>
      
      <label for="section">Seção</label>
      <input 
        id="section" 
        class="form-control my-2"
        name="section" 
        type="text"
        value="<?=($updateData) ? $updateData['section'] : '';?>"
      />
    
      <input class="mt-2" type="submit" value="Enviar"/>
    </form>
  </div>
</div>

<?php include_once 'components/table.php';?>
