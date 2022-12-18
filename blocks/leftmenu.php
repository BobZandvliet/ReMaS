<div class="leftmenu">
<img src="../content/images/recycle.png" alt="">



    <div class="menulinks">

    <?php 
    if($_SESSION['rolID'] == 2 ||  $_SESSION['rolID'] == 5){
    echo '<a href="../inname.php">Inname</a>';
    }
    ?>
      
    <?php 
    if($_SESSION['rolID'] == 3 ||  $_SESSION['rolID'] == 5){
    echo  "<a href='../verwerking.php'>Verwerking</a>";
    }?>

    <?php 
    if($_SESSION['rolID'] == 4 ||  $_SESSION['rolID'] == 5){
    echo  "<a href='../uitgifte.php'>Uitgifte</a>";
    }?>

    <?php 
      if($_SESSION['naam'] && $_SESSION['rolID'] != 6){
     echo "<a href='../rapportage.php'>Rapportage</a>";
    }?>

    <?php 
      if($_SESSION['rolID'] == 5 ||  $_SESSION['rolID'] == 6){
      echo "<a href='../onderhoud.php'>Onderhoud</a>";
    }
    if($_SESSION['rolID'] == 6 && $_SERVER["PHP_SELF"] == '/onderhoud.php'){
      echo '<div class="sub" ><a href="../inname.php">Bon afdrukken</a></div>';
      echo '<div class="sub" ><a href="../register.php">Medewerkers</a></div>';
    }
    ?>

      <?php 
      if($_SESSION['rolID'] == 6 ){
      echo "<a href='../gebruikersbeheer.php'>Gebruikers beheer</a>";
    }
    ?>

    <?php
    if($_SESSION){
    echo '<a href="../logout.php">Logout</a>';  
    }?>
    </div>
</div>