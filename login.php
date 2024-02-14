<?php

  require_once 'connection.php';

  $username = $_POST['username'];
  $password = base64_encode($_POST['password']);

  $query = "SELECT * FROM `users` WHERE `username` = '$username';";

  $response = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $data = mysqli_fetch_assoc($response);

  if ($username == $data['username'] && $password == $data['password']) {
    $userData['username'] = $username;

    session_start();
    $_SESSION[base64_encode('user_data')] = $userData;

    header("location: index.php?page=admin");
  }

?>