<html>
    <head>
        <title> Admin dash </title>
        <!-- <link rel="stylesheet" href="css/table.css"> -->
        <link rel="stylesheet" type="text/css" href="style/style2.css">
        
        
        
        <script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
        
      <script>
function validateForm() {
  var x = document.forms["form"]["correct"].value;
    if (x>3 || x<1) {
    document.getElementById("errormsg").innerHTML="Please enter a valid option";
     return false;}
  if (isNaN(x)){
      
  document.getElementById("errormsg").innerHTML="Please enter a number option";
       return false;
  }  }
</script>  
        
    <script type="text/javascript">
function JSFunction() {
    alert('In test Function');   // This demonstrates that the function was called
}
</script>   
               
        
        
        
    </head>
    
    <body>
 
        
                 
  
        <div class="topnav">
  <a <?php
           if (@$_GET['q'] == 0) 
               echo 'class="active"';?>href="dash.php?q=0">Users</a>
            
            
  <a <?php
           if (@$_GET['q'] == 1) 
               echo 'class="active"';?> href="dash.php?q=1">Delete quiz</a>
            
  <a <?php
           if (@$_GET['q'] == 2) 
               echo 'class="active"';?> href="dash.php?q=2">Add quiz</a>
            
            
    <a <?php
           if (@$_GET['q'] == 4) 
               echo 'class="active"';?>href="dash.php?q=4">Feedback</a>          
            
  <div class="topnav-right">
    <a <?php 
         require('config/config.php');
        session_start();
        $username = $_SESSION['name']; 
      ?>>Hello <?php echo $username;?> </a>
      <a>|</a>
    <a href="logout.php">logout</a>
  </div>
</div>
        
        
<?php 

            //at index page where you want to display message
            if(isset($_GET['confirmation']) && !empty($_GET['confirmation'])){
                echo $_GET['confirmation'];
            }

        ?>        

        
      
        
        
  <?php
 require('config/config.php');
if (@$_GET['q'] == 0) {
    
    
 $result = mysqli_query($con, "SELECT * FROM registration") or die('Error');  ///// <<<<<
 echo '<div class="table"> <table><tr><th>#</th><th>UserName</th><th>Email</th><th>Address</th><th>phone number</th><th>delete</th></tr> ';
 $count=1;
 
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $count++. "</td>";
      echo "<td>" . $row['username'] . "</td>"; ///// <<<<<
      echo "<td>" . $row['email'] . "</td>"; ///// <<<<<
      echo "<td>" . $row['address'] . "</td>"; ///// <<<<<
      echo "<td>" . $row['phone'] . "</td>"; ///// <<<<<
      echo "<td><a href='delete.php?id=".$row['ID']."' class='delbtn'>Delete </a></td>";
      echo "</tr>";


} }
        
  if (@$_GET['q'] == 1) {
      
      $result = mysqli_query($con, "SELECT * FROM quiz") or die('Error');  ///// <<<<<
 echo '<div class="table"> <table><tr><th>#</th><th>Quiz title</th><th>Number of slove</th><th>delete</th></tr> ';
 $count=1;
 
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $count++. "</td>";
      echo "<td>" . $row['title'] . "</td>"; ///// <<<<<
      echo "<td>" . $row['total'] . "</td>"; ///// <<<<<
      echo "<td><a href='deleteq.php?id=".$row['id']."' class='delbtn'>Delete </a></td>";
      echo "</tr>";
      
      
      
  }    }
 
        if (@$_GET['q'] == 2 && !(@$_GET['step'])) {
            
            echo '<div class="container">  
  <form id="contact" name="form "action="add.php"  method="post"  >
    <h3>Enter Quiz Title</h3>
    <fieldset>
      <input name="title" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <button name="NEXT" type="submit" id="NEXT">Next</button>
    </fieldset>';
 echo' </form>
</div>';}
        
        if (@$_GET['q'] == 2 && (@$_GET['step']) == 2) { 
            
            echo '<div class="container">  
            

  
  <form id="contact" name="form" onSubmit="return validateForm()" action="add.php?qid=' .  @$_GET['qid'] . '&n=2"   method="post">';
            
   
  
 
  
 
    echo '<h3>Enter Question Details</h3>';
   echo' <fieldset>
      <label>Question Text</label>
      <input name="text" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option One</label>
      <input name="op1" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option Two</label>
      <input name="op2"  type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option Three</label>
      <input name="op3"  type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>Correct option</label>
      <input name="correct" type="text" tabindex="1" required autofocus>'; 

             
  echo '<fieldset>
      <button name="ADD" type="submit" id="ADD">Add</button>
    </fieldset>';
    
    
    echo ' <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"> ';
    if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7']."";}
  echo'  </form>
       </div>';
        
        }
        
         if (@$_GET['q'] == 2 && (@$_GET['step']) == 3) { 
            
            echo '<div class="container">  
            

  
  <form id="contact" name="form" onSubmit="return validateForm()" action="add.php?qid=' .  @$_GET['qid'] . '&n=2"   method="post">';
            
   
    echo '<h3>Enter Question Details</h3>
    
    <fieldset>
      <label>Question Text</label>
      <input name="text" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option One</label>
      <input name="op1" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option Two</label>
      <input name="op2"  type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>option Three</label>
      <input name="op3"  type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>Correct option</label>
      <input name="correct" type="text" tabindex="1" required autofocus>'; 

  echo '<fieldset>
      <button name="AD2" type="submit" id="AD2">Add</button>
    </fieldset>';
    
   echo ' <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"> ';
    if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7']."";}
  echo'  </form>
       </div>';  
    
  }
        
        
        
  if (@$_GET['q'] == 4 ) {
            
          $result = mysqli_query($con, "SELECT * FROM feedback") or die('Error');  ///// <<<<<
 echo '<div class="table"> <table><tr><th>#</th><th>UserName</th><th>Feedback</th></tr> ';
 $count=1;
 
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $count++. "</td>";
      echo "<td>" . $row['name'] . "</td>"; ///// <<<<<
      echo "<td>" . $row['text'] . "</td>"; ///// <<<<<
      echo "</tr>";


}}       
        
        
        ?>
        
        
 <?php
    if(isset($_POST['SEND'])){
    
    require('config/config.php');
        $qid = @$_GET['id'];
        $q1="SELECT * FROM quiz WHERE id= ".@$_GET['id']."";
        $result2 = mysqli_query($con, $q1);
         while($row = mysqli_fetch_array($result2)){
             $total=$row['total'];
             $t=$total+1;
             $q= mysqli_query($con,"UPDATE quiz SET total='$t'  WHERE id= $qid");
             
        
         
         }
           
        
$qid = @$_GET['id'];
$result = mysqli_query($con, "SELECT * FROM questions WHERE quiz_id= $qid ") or die('Error');  
          echo '<div class="table"> <table><tr><th>Questions</th><th>Correct Answer</th></tr> ';
            $count=1;
 
    while($row = mysqli_fetch_array($result))
    {
         $id=$row['id'];
        echo "<tr>";
      echo "<td>" . $row['text']. "</td>";
      echo "<td>";     
        $result1 = mysqli_query($con, "SELECT * FROM answer WHERE qz_id= $id ") or die('Error');  ///// <<<<<
        while($row = mysqli_fetch_array($result1))
        {
            if($row['is_correct']==1){
                 echo  $row['text'] ;
                echo"</td>";
 echo "</tr>";
            }
     
        }}}
        

?>     

        
         


    </body>    
    
    
    
    </html>



    