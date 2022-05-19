<html>
    <head>
        <title> Take Quiz </title>
        <!-- <link rel="stylesheet" href="css/table.css"> -->
        <link rel="stylesheet" type="text/css" href="style.css">
        
        
        
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
    </head>

<body>
<nav class="menu"> 
    <ul><li>.</li></ul>
    </nav>
    
    
    
    
    
    </body>

<?php
    if(isset($_POST['SEND'])){
require('config/config.php');
    
$qid = @$_GET['id'];

$result = mysqli_query($con, "SELECT * FROM questions WHERE quiz_id= $qid LIMIT 1,2") or die('Error');

    echo '<div class="container">           
  <form id="contact" action="userdash.php?id='.$qid.'"" method="POST"> 
  <div class="box">';
    
    while ($row = mysqli_fetch_assoc($result)) {
    $row1=$row['text'];
          $qz_id=$row['id'];
        echo "<h2>".$row1."</h2>";

        
     $result2 = mysqli_query($con, "SELECT * FROM answer WHERE qz_id= $qz_id") or die('Error');
     while ($row = mysqli_fetch_assoc($result2)) {
    $row1=$row['text'];
         echo '<h2><input type="radio" id="html"">
  <label for="html">'.$row1."</h2></label><br>";


}      
}      



    
echo '
      <button name="SEND" type="submit" i>SEND</button>
</form>
       </div>';
        
        
    
    }



?>

