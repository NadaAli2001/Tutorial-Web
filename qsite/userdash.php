<html>
    <head>
        <title> User dash </title>
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
});




</script>

   </script>     
        
        
    </head>
    
    <body>
 
        
                 
  
        <div class="topnav">
  <a <?php
           if (@$_GET['q'] == 0) 
               echo 'class="active"';?>href="userdash.php">Take Quiz</a>
            
            
  <a <?php
           if (@$_GET['q'] == 1) 
               echo 'class="active"';?> href="userdash.php?q=1">Feedback</a>
            
  
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
 require('config/config.php');
if (@$_GET['q'] == 0) {
    
          $result = mysqli_query($con, "SELECT * FROM quiz") or die('Error');  ///// <<<<<
          echo '<div class="table"> <table><tr><th>#</th><th>Quiz Title</th><th>Take Quiz</th></tr> ';
            $count=1;
 
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>" . $count++. "</td>";
      echo "<td>" . $row['title'] . "</td>"; ///// <<<<<
      echo "<td><a href='Take.php?id=".$row['id']."' class='delbtn'> Start </a></td>";
      echo "</tr>";


} 
}
        
  if (@$_GET['q'] == 1) { //////////////////////>>>>>>updated<<<<//////////////////
        echo '<div class="container">  
  <form id="contact" action="feedback.php"  method="post">
    <h3>Enter Your Feedback</h3>
    <textarea id="ftext" name="ftext" value="" rows="4" cols="50" required> 
    </textarea>
    <fieldset>
      <button name="feed" type="submit" id="NEXT">submit</button>
    </fieldset>
    
   
  </form>
</div>'; 
   }
   
 
        

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



    