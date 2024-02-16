<?php

  require_once 'connection.php';
  
  function insert($conn) {
    if (isset($_POST['description']) && !empty($_POST['description'])) {
      $description = $_POST['description'];
      $ean_code = $_POST['ean_code'];
      $retail_price = $_POST['retail_price'];
      $wholesale_price = $_POST['wholesale_price'];
      $details = $_POST['details'];
      $section = $_POST['section'];

      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, "INSERT INTO `products` (
        `description`,
        `ean_code`,
        `retail_price`,
        `wholesale_price`,
        `details`,
        `section`
      ) VALUES (?, ?, ?, ?, ?, ?)");
      
      mysqli_stmt_bind_param($stmt, 'ssddss', 
        $description,
        $ean_code,
        $retail_price,
        $wholesale_price,
        $details, 
        $section
      );
      mysqli_stmt_execute($stmt);
      
      $response = mysqli_stmt_get_result($stmt) or die(mysqli_stmt_error($stmt));

      mysqli_stmt_close($stmt);

      return $response;
    }
  }

  function listAll($conn) {
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT * FROM `products`");
    mysqli_stmt_execute($stmt);

    $response = mysqli_stmt_get_result($stmt) or die(mysqli_error($conn));
  
    mysqli_stmt_close($stmt);
    
    return $response;
  }

  function listOne($conn, $field, $value) {
    if (in_array($field, [
      'id',
      'description', 
      'ean_code',
      'retail_price',
      'wholesale_price',
      'details',
      'section'
      ])) {
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, "SELECT * FROM `products` WHERE $field = ?");
      mysqli_stmt_bind_param($stmt, 's', $value);
      mysqli_stmt_execute($stmt);
  
      $response = mysqli_stmt_get_result($stmt) or die(mysqli_error($conn));
    
      mysqli_stmt_close($stmt);
  
      return $response;
    }
  }

  function update($conn) {
    $id = $_GET['update'];
    unset($_POST['update']);

    $description = $_POST['description'];
    $ean_code = $_POST['ean_code'];
    $retail_price = $_POST['retail_price'];
    $wholesale_price = $_POST['wholesale_price'];
    $details = $_POST['details'];
    $section = $_POST['section'];

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "UPDATE `products` SET 
        `description` = ?,
        `ean_code` = ?,
        `retail_price` = ?,
        `wholesale_price` = ?,
        `details` = ?,
        `section` = ? WHERE `id` = ?"
    );

    mysqli_stmt_bind_param($stmt, 'ssddssi', 
      $description,
      $ean_code,
      $retail_price,
      $wholesale_price,
      $details, 
      $section,
      $id
    );

    mysqli_stmt_execute($stmt);
      
    $response = mysqli_stmt_get_result($stmt) or die(mysqli_stmt_error($stmt));

    mysqli_stmt_close($stmt);

    return $response;
  }

  function delete($conn) {
    $id = $_GET['delete'];

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM `products` WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $response = mysqli_stmt_get_result($stmt) or die(mysqli_error($conn));
  
    mysqli_stmt_close($stmt);
    
    return $response;
  }
    
?>