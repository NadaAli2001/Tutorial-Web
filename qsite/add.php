
    
<?php
require('config/config.php');

if(isset($_POST['NEXT'])){
 
  
    
 $qtitle=$_POST['title']; 
 $id  = uniqid();   
 $qtitle = stripslashes( $qtitle);
 $qtitle = addslashes( $qtitle);   

 $q= mysqli_query($con,"INSERT INTO quiz(id, title) VALUES('$id','$qtitle')");
    header("location:dash.php?q=2&step=2&qid=$id");  }

  


if(isset($_POST['ADD'])){
   
        $qid = @$_GET['qid'];
        $ch  = @$_GET['n'];
           $text=$_POST['text']; 
           $text = stripslashes($text);
           $text = addslashes($text); 
           $q_id= uniqid();   
           $q= "INSERT INTO questions(id,quiz_id,text) VALUES('$q_id','$qid','$text')"; 
    
           $choice = array();
           $choice[1]=$_POST['op1']; 
           $choice[2]=$_POST['op2'];  
           $choice[3]=$_POST['op3'];  
 
           $correctans=$_POST['correct'];  
    
  
     
          if(mysqli_query($con, $q)){
           foreach($choice as $op => $value){
           if($value != ''){
           if($correctans == $op){
             $correct=1;
             
          }else{
             $correct=0;
         }
          $q1= "INSERT INTO answer(quiz_id,qz_id,is_correct,text) VALUES('$qid','$q_id','$correct','$value')"; 
          mysqli_query($con, $q1);
         
     }}}header("location:dash.php?q=2&step=3&qid=$qid");}


if(isset($_POST['AD2'])){
   
        $qid = @$_GET['qid'];
        $ch  = @$_GET['n'];
           $text=$_POST['text']; 
           $text = stripslashes($text);
           $text = addslashes($text); 
           $q_id= uniqid();   
           $q= "INSERT INTO questions(id,quiz_id,text) VALUES('$q_id','$qid','$text')"; 
    
           $choice = array();
           $choice[1]=$_POST['op1']; 
           $choice[2]=$_POST['op2'];  
           $choice[3]=$_POST['op3'];  
 
           $correctans=$_POST['correct'];  
    
  
     
          if(mysqli_query($con, $q)){
           foreach($choice as $op => $value){
           if($value != ''){
           if($correctans == $op){
             $correct=1;
             
          }else{
             $correct=0;
         }
          $q1= "INSERT INTO answer(quiz_id,qz_id,is_correct,text) VALUES('$qid','$q_id','$correct','$value')"; 
          mysqli_query($con, $q1);
         
     }}}header("location:dash.php?q=1");}






     

?>    
    



