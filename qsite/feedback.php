<?php

require('config/config.php');
session_start();
$name = $_SESSION['name'];

///////////////>>>>>>updated<<<<//////////////////
$text=$_POST['ftext'];
$submit=$_POST['feed'];

$text= strip_tags($text);
$text=htmlentities($text);



if(isset($submit) && !empty($text)){

    
    $q= "INSERT INTO feedback(name, text) VALUES('$name','$text')" or die('Error!');
    
    if (mysqli_query($con,$q)) {
     echo '<script>';   
     echo 'alert("Feedback Submitted Successfully.");';
     echo 'location="userdash.php?q=1";';
     echo '</script>';
     } else {
      echo '<script type="text/javascript">';
      echo 'alert("Error submitting feedback.")'; 
      echo '</script>';
     }
   
    
   }else { 
     echo '<script>';
     echo 'alert("Empty! Please write your feedback.");';
     echo 'location="userdash.php?q=1";';
     echo '</script>';}
 
  ?>