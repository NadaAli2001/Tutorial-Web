


<?php
require('config/config.php'); 

if(isset($_GET['id'])){
        $deluserid= $_GET['id'];
        $query="DELETE FROM registration WHERE id='$deluserid'" or die('Error'); ///// <<<<<
    
        if (mysqli_query($con, $query)) {
             header("location:dash.php?q=0");  
            echo '<script type="text/javascript">';
            echo 'alert("User deleted successfully")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error deleting user")'; 
            echo '</script>';
            
        }
        
    }



?>