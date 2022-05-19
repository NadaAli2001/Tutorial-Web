<?php
require('config/config.php'); 

if(isset($_GET['id'])){
        $delid= $_GET['id'];
        $query="DELETE FROM quiz WHERE id='$delid'" or die('Error'); ///// <<<<<
    
        if (mysqli_query($con, $query)) {
               
           $query2="DELETE FROM questions WHERE quiz_id='$delid'" or die('Error'); ///// <<<<<  
            $result= mysqli_query($con, $query2);
            
             $query3="DELETE FROM answer WHERE quiz_id='$delid'" or die('Error'); ///// <<<<< 
               $result= mysqli_query($con, $query3);
            }
           
        
       header("location:dash.php?q=1"); 
    }



?>