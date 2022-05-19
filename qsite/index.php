<?php
session_start();
if(isset($_SESSION['username']) && (!isset($_SESSION['key']))){
   header('location:account.php?q=1');
}
else if(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
   header('location:dash.php?q=0');
}
else{}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Quizzer  </title>
<link rel="stylesheet" href="style\HomeStyle.css">

<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<script>
function validateForm() {
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  } 
    
  var m = document.forms["form"]["phone"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
    var e = document.forms["form"]["email"].value;
  if (e.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid Email";
    return false;
  }
    
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.forms["form"]["email"].value){
       {
    document.getElementById("errormsg").innerHTML="Please enter a valid Email";
    return false;
  }
  }
        
  var p = document.forms["form"]["password"].value;
  if(p == null || p == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  } 
}
</script>
</head>
<body>
<!--SaraPart-->   
<div class="header">
    <div class="center">
         <input type="checkbox" id="show" >
         <label for="show" class="show-btn">User login</label>
         <div class="container">
            <label for="show" title="close"></label>
            <h2>Login Form</h2>
            
            <form  method="post" action="login.php">
               <div class="data">
                  <label>User Name</label>
                  <input type="text" name="username" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" name="password" required>
               </div>
            
               <input type="submit" name="sub" id="sub" value="Log In">
             
            </form>
         </div>
      </div> </div>
<!--**************************************************************-->
<!--NadaPart-->     
    <div class="register">
  <form name="form" action="sign.php" onSubmit="return validateForm()" method="GET">
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <h2 align="center">Registration Form</h2>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"><?php
if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
}
?></div>
    
  </div>
<!--USERNAME-->    
    <label class="col-md-12 control-label" for="username"></label> 
    <label for="name">User Name</label> 
    <input maxlength="20" id="username" name="username" class="form-control input-md" type="text" value="<?php if(isset($_GET['username'])): ?>
        <?php echo $_GET["username"]; ?>
<?php endif; ?> ">
    
    
<!--EMAIL-->
  <label class="col-md-12 control-label" for="email"></label>  
      <label for="email">Email</label>
  <input maxlength="30" type="email" id="email" name="email" class="form-control input-md" value="<?php if(isset($_GET['email'])): ?>
        <?php echo $_GET["email"]; ?>
<?php endif; ?> ">
  
<!--PASSWORD-->
  <label class="col-md-12 control-label" for="password"></label>  
       <label for="email">Password</label>
  <input maxlength="20" type=password id="password" name="password" class="form-control input-md" value="<?php if(isset($_GET['password'])): ?>
        <?php echo $_GET["password"]; ?>
<?php endif; ?> ">
    
<!--PHONE-->
  <label class="col-md-12 control-label" for="phone"></label>  
      <label for="email">Phone Number</label>
  <input pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" type="tel" id="phone" name="phone" class="form-control input-md" value="<?php if(isset($_GET['phone'])): ?>
        <?php echo $_GET["phone"]; ?>
<?php endif; ?> ">
    
<!--ADDRESS-->
  <label class="col-md-12 control-label" for="address"></label>  
      <label for="address">Address</label>
      <input maxlength="50" type=text id="address" name="address" class="form-control input-md" value="<?php if(isset($_GET['address'])): ?>
        <?php echo $_GET["address"]; ?>
<?php endif; ?> ">
    
<!--BUTTON-->
      <div>
  <label class="col-md-12 control-label" for=""></label>
      <input value="register" type="submit" maxlength="50" name="register" class="form-control input-md"></div> 
    
  <div align="center">
      <?php
      
      if (@$_GET['q'] == 1){
          $username = $_GET['username'];
function function_alert($message) {
      
    // Display the alert box 
    echo "welcome "."$message";
}
  
 
// Function call
function_alert($username);} ?>
    </div>
</form>
</div>
</div>
</body>
      
    
    
</html>
