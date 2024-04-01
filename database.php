<?php

  require_once('db_credentials.php');

  function db_connect($server , $user_name , $password , $db_name) {
    $connection = mysqli_connect($server, $user_name , $password , $db_name);
    confirm_db_connect();
    // echo "connected successfulllllllly";
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }
  $conn = db_connect(DB_SERVER , DB_USER , DB_PASS , DB_NAME);
?>
