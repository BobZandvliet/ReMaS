
<?php
include 'header.php';
?>
<head><title>Superior Waste</title></head>

  <div class="mainpage">
    <?php include 'leftmenu.php';?>
  


  <div class="page">

  <?php  
 //login_success.php   
 if(isset($_SESSION["naam"]))  
 
 {  
    ?>
      <h3><?php echo $_SESSION["naam"]?>ata</h3> 
      
    <?php
  


 }  
 else  
 {  
      header("location:login.php");  
 }  






 ?>

  </div>


  </div>


  <?php
include_once 'footer.php';
?>