<?php
    // Create Connection
    $con = mysqli_connect("localhost", "root", "","qsite");

    // Check Connection
    if(mysqli_connect_errno()){
        // Connection Failed
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
?>