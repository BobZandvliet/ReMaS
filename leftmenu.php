<div class="leftmenu">
<img src="content/images/recycle.png" alt="">


    <div class="menulinks">

    <?php 
    if($_SESSION){
    echo "<a href='inname.php'>Inname</a>";
    }?>
      
    <?php 
    if($_SESSION){
    echo  "<a href='verwerking.php'>Verwerking</a>";
    }?>

    <?php 
    if($_SESSION){
    echo  "<a href='uitgifte.php'>Uitgifte</a>";
    }?>

    <?php 
      if($_SESSION){
     echo "<a href='rapportage.php'>Rapportage</a>";
    }?>

    <?php 
      if($_SESSION){
      echo "<a href='onderhoud.php'>Onderhoud</a>";
    }?>
    <?php
    if($_SESSION){
    echo '<br /><br /><a href="logout.php">Logout</a>';  
    }?>
    </div>
</div>