<?php

  require_once 'connection.php';
  
  function insert($conn) {
    if (isset($_POST['description']) && !empty($_POST['description'])) {
      $fields = implode("`, `", array_keys($_POST));
      $values = implode("', '", $_POST);

      $query = "INSERT INTO `products` (`$fields`) VALUES ('$values')";

      $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
      return $response;
    }
  }

  function listAll($conn) {
    $query = "SELECT * FROM `products`;";

    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    return $response;
  }

  function listOne($conn, $field, $value) {
    $query = "SELECT * FROM `products` WHERE `$field` = $value";

    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    return $response;

  }

  function update($conn) {
    $id = $_GET['update'];
    unset($_POST['update']);

    $fields = array_keys($_POST);
    $values = $_POST;

    $query = "UPDATE `products` SET ";

    for ($i=0; $i < count($fields); $i++) { 
      $query = $query."`".$fields[$i]."` = '".$values[$fields[$i]]."', ";
    }

    $query = substr($query, 0, -2)." WHERE `id` = $id;";

    $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    return $response;
  }

  function delete($conn) {
    if(isset($_GET['delete'])) {
      $id = $_GET['delete'];
      $query = "DELETE FROM `products` WHERE `id` = $id";

      $response = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
      return $response;
    }
  }

?>