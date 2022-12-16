<?php
include 'header.php';
?>

<?php  
 //login_success.php   
 if(isset($_SESSION["uName"]))  
 
 {  
    ?>
      <h3>Login Success, Welcome - <?php echo $_SESSION["uName"]?></h3> 
      
    <?php
  


 }  
 else  
 {  
      header("location:login.php");  
 }  





 var_dump(session_status());
 var_dump(session_id());
 var_dump($_SESSION);
 ?>


<?php
include 'footer.php';
?>