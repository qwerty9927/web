<?php
  $serverName = "localhost";
  $username = "root";
  $password = "";
  
  function connect($db){
    global $serverName, $username, $password;
    $conn = mysqli_connect($serverName, $username, $password, $db);
    if(!$conn){
      die("Connect Failure");
    }
    // echo "Connect successfull";
    return $conn;
  }

  function close_connect($connect){
    mysqli_close($connect);
    // echo "Close successfull";
  }
?>