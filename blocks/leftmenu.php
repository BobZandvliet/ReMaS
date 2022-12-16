<div class="leftmenu">
<img src="../content/images/recycle.png" alt="">



    <div class="menulinks">

    <?php 
    if($_SESSION){
    echo '<a href="../inname.php">Inname</a>';
    }


    ?>
      
    <?php 
    if($_SESSION){
    echo  "<a href='../verwerking.php'>Verwerking</a>";
    }?>

    <?php 
    if($_SESSION){
    echo  "<a href='../uitgifte.php'>Uitgifte</a>";
    }?>

    <?php 
      if($_SESSION){
     echo "<a href='../rapportage.php'>Rapportage</a>";
    }?>

    <?php 
      if($_SESSION){
      echo "<a href='../onderhoud.php'>Onderhoud</a>";
    }
    if($_SESSION && $_SERVER["PHP_SELF"] == '/onderhoud.php'){
      echo '<div class="sub" ><a href="../inname.php">Bon afdrukken</a></div>';
    }
    
    ?>
    <?php
    if($_SESSION){
    echo '<a href="../logout.php">Logout</a>';  
    }?>
    </div>
</div>