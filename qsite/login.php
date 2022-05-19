<?php

    
require('config/config.php');
    session_start();
if(isset($_POST['sub'])){  
$username = $_POST['username'];
$password= sha1($_POST['password']);

$username = stripslashes($username);
$username = addslashes($username);
$stmt = $con->prepare("SELECT * FROM `registration` WHERE username=? AND password=?") or die(mysqli_error());
    $stmt->bind_param("ss", $username, $password); 
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
                                                   
$count = mysqli_num_rows($result);
     if ($count == 1) {while ($row = mysqli_fetch_array($result)) {
          $name = $row['username'];
      }
       $_SESSION["name"]     = $name;               
      header("location:userdash.php?q=0");
    
  
  } else
      header("location:$ref?w=Warning : Access denied"); }   

?>