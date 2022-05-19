<?php
require('config/config.php');
if(isset($_GET['register'])){


//save DATA in DB
// Fetching variables of the form which travels in URL
$username = $_GET['username'];
$email    = $_GET['email'];
$password = $_GET['password'];
$phone    = $_GET['phone'];
$address  = $_GET['address'];

// secure password
$secured_password = sha1($password);}

if($con->connect_error){ //check connection
        die('Connection Failed: '.$con->connect_error);
    }
    else { //if no error
        $select = mysqli_query($con, "SELECT * FROM registration WHERE username = '".$_GET['username']."'");
        $query = mysqli_query($con, "INSERT INTO registration (username, email, password, phone, address) VALUES ('$username', '$email', '$secured_password', '$phone', '$address')");
        
        
        $con->close();
         header("location:index.php?q=1&username=$username");
    }

?>


