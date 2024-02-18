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
    } elseif ($_POST['action'] == 'delete') {
      delete($conn);
    }
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
    $tableData[$i]['action'] = '
      <div>
        <a 
          class="btn btn-primary" 
          href="?page=admin&update='.$tableDataIds[$i]['id'].'"
        >
          Editar
        </a>
        
        <form action="#" method="post">
          <input id="action" name="action" type="hidden" value="delete"/>
          <input 
            id="id"
            name="id"
            type="hidden"
            value="'.$tableDataIds[$i]['id'].'"
          />
          <input class="btn btn-danger" type="submit" value="Excluir"/>
        </form>
      </div>
    ';
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

      <?=($updateData) ? '
        <input 
          id="id"
          name="id"
          type="hidden" 
          value="'.$updateData['id'].'"
        />
      ' : ''?>
    
      <div class="input-group my-2">
        <label class="input-group-text" for="description">Descrição</label>
        <input 
          id="description" 
          class="form-control"
          name="description" 
          type="text"
          value="<?=($updateData) ? $updateData['description'] : '';?>"
        />
      </div>
    
      <div class="input-group my-2">
        <label class="input-group-text" for="ean_code">Código de Barras</label>
        <input
          id="ean_code"
          class="form-control"
          name="ean_code"
          type="text"
          value="<?=($updateData) ? $updateData['ean_code'] : '';?>"
        />
      </div>

      <div class="row my-2">
        <div class="col-sm-6">
          <div class="input-group">
            <label class="input-group-text" for="retail_price">Preço de Varejo</label>
              <input 
                id="retail_price" 
                class="form-control"
                name="retail_price" 
                type="number"
                step="0.01"
                min="0.01"
                max="99999.99"
                value="<?=($updateData) ? $updateData['retail_price'] : 0.1;?>"
              />
          </div>  
        </div>
        
        <div class="col-sm-6">
          <div class="input-group">
            <label class="input-group-text" for="wholesale_price">Preço de Atacado</label>
              <input 
                id="wholesale_price" 
                name="wholesale_price" 
                class="form-control"
                type="number"
                step="0.01"
                min="0.01"
                max="99999.99"
                value="<?=($updateData) ? $updateData['wholesale_price'] : 0.1;?>"
              />
          </div>  
        </div>
      </div>
      
      <div class="input-group my-2">
        <label class="input-group-text" for="details">Detalhes</label>
        <textarea
          id="details"
          class="form-control"
          name="details"
          maxlength="500"
        >
          <?=($updateData) ? $updateData['details'] : '';?>
        </textarea>
      </div>
      
      <div class="input-group my-2">
        <label class="input-group-text" for="section">Seção</label>
        <input 
          id="section" 
          class="form-control"
          name="section" 
          type="text"
          value="<?=($updateData) ? $updateData['section'] : '';?>"
        />
      </div>
    
      <input class="btn btn-primary mt-2" type="submit" value="Enviar"/>
    </form>
  </div>
</div>

<?php include_once 'components/table.php';?>
