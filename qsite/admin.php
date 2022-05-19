

<html>
    <head>
        <title> Admin Log in </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    
    <nav class="menu">
        .
    </nav>
     
    <div class="box">
        
        <h2> Admin Login</h2>
        
        <form method="post" action="admin.php">
            
            <div class="inputBox">
             <input type="" name="username" required="">
             <label>Username</label>
            </div>
            <div class="inputBox" >
                <input type="password" name="password" required="">
                <label>Password</label>
                
            </div>
            <input type="submit" name="sub" value="Log In">
        </form>
    </div>
    

    
    
</body>  
 <?php

    
require('config/config.php');
    session_start();
if(isset($_POST['sub'])){  
$username = $_POST['username'];
$password= sha1($_POST['password']);
$stmt = $con->prepare("SELECT username FROM admin WHERE username=? and password=?") or die(mysqli_error());
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
    header("location:dash.php?q=0");
    
  
} else
    header("location:$ref?w=Warning : Access denied");
    
 }   
    
?> 
    
</html>