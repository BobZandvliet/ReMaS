<div class="leftmenu">
<img src="content/images/recycle.png" alt="">



    <div class="menulinks">
      <?php 
      //ik heb het linker menu in een apparte file gezet omdat elke pagina de linker menu heeft, deze include ik dan in elke pagina
      //hier door hoef ik de file maar 1 keer te maken
      // het menu laat menu items zien gebasseerd op de user rol die een account heeft.
      //de user rol wordt opgeslagen in de session
      
      if(isset($_SESSION['naam'])){?>
        <?php 
        if($_SESSION['rolID'] == 2 ||  $_SESSION['rolID'] == 5){?>
        <a href="inname.php">Inname</a>

        <?php
        }
        ?>
        
        <?php 
        if($_SESSION['rolID'] == 3 ||  $_SESSION['rolID'] == 5){?>
        <a href='verwerking.php'>Verwerking</a>
        <?php  
        }
        ?>


        <?php 
        if($_SESSION['rolID'] == 4 ||  $_SESSION['rolID'] == 5){?>
        <a href='uitgifte.php'>Uitgifte</a>
        <?php  
        }
        ?>

        <?php 
        if($_SESSION['rolID'] || 5 && $_SESSION['rolID'] || 4 && $_SESSION['rolID'] || 3 && $_SESSION['rolID'] || 2 && $_SESSION['rolID'] || 1){?>
      <a href='rapportage.php'>Rapportage</a>
      <?php  
        }
        ?>
        <?php 
        if($_SESSION['rolID'] == 5 ||  $_SESSION['rolID'] == 6){?>
        <a href='onderhoud.php'>Onderhoud</a>
        <div class="sub" ><a href="apparaten.php">Apparaten</a></div>
        <div class="sub" ><a href="onderdelen.php">Onderdelen</a></div>

        <?php  
        }
        ?>

        <?php
        if($_SESSION['rolID'] == 6){?>
        <!-- <div class="sub" ><a href="/">Bon afdrukken</a></div> -->
        <a href='gebruikersbeheer.php'>Gebruikers beheer</a>
        <div class="sub" ><a href="register.php">Medewerker-toevoegen</a></div>
       
      
        <?php  
        }
        ?>


        <?php
        if($_SESSION){?>
        <a href="logout.php">Logout</a>
        <?php
        }
      ?>
      <?php
      }
      ?>

    </div>

</div>