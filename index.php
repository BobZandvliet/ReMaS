<?php
include 'header.php';
?>
<head><title>Welkom bij ReMaS</title></head>

  <div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">
    <?php
    
    
    if(!isset($_SESSION["naam"])){
      ?>

    <div class="welkom">
      <p> 
        Welkom bij ReMaS </br>
        het REcycle Management System voor het project </br>
        Superior Waste van de gemeente Emserveen.
      </p>

    </div>


      
        <form class="logform" action="includes/login.php" method="post">

          
              <input type="text" name="naam" placeholder="Gebruikersnaam" required><br>

          
              <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>

          <input id="but" type="submit" name="login" value="Inloggen">

        </form>
      <?php
      
      }
      
      if(isset($_GET['errorpw'])){
        echo '<div class="errorbanner">Wachtwoord of gebruikersnaam verkeerd</div>';
        
      }
      

      
      ?>

      <?php  
        //login_success.php   
        if(isset($_SESSION["naam"]))  
        
        {  
            ?>
              <h3> Ingelogd als <?= $_SESSION["naam"]?></h3> 
              
            <?php
          


        }  
      ?>

<?php







?>


  </div>


  </div>


  <?php
include_once 'footer.php';
?>