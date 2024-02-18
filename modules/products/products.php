<?php

  require_once 'connection.php';
  
  function insert($conn) {
    if (isset($_POST['description']) && !empty($_POST['description'])) {
      header("location: index.php?page=admin");

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
        $_POST['description'],
        $_POST['ean_code'],
        $$_´POST['retail_price'],
        $$_POST['wholesale_price'],
        $_POST['details'], 
        $_POST['section']
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
    header("location: index.php?page=admin");

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
      $_POST['description'],
      $_POST['ean_code'],
      $_POST['retail_price'],
      $_POST['wholesale_price'],
      $_POST['details'], 
      $_POST['section'],
      $_POST['id']
    );

    mysqli_stmt_execute($stmt);
      
    $response = mysqli_stmt_get_result($stmt) or die(mysqli_stmt_error($stmt));

    mysqli_stmt_close($stmt);

    return $response;
  }

  function delete($conn) {
    header("location: index.php?page=admin");

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "DELETE FROM `products` WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, 'i', $_POST['id']);
    mysqli_stmt_execute($stmt);

    $response = mysqli_stmt_get_result($stmt) or die(mysqli_error($conn));
  
    mysqli_stmt_close($stmt);
    
    return $response;
  }
    
?>