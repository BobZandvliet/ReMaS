<?php
include 'header.php';
?>
    <script src="scripts/js.js"></script>
<head><title>Welkom bij ReMaS</title></head>

  <div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">



    <form action="" method="POST">

                <select name="medewerker" class="rolselect">
                <section class="boven">
                  <option value="<?= $_SESSION['naam']?>"><?= $_SESSION['naam']?></option>
                </select>
                <input type="text" class="rolselect" id="tijd" name="tijd" value="<?php echo date('d-m-Y h:i', time());?>">
                </section>
                <section>
                <input type="text" class="rolselect" id="veld" name="veld" placeholder="Aantal producten">
                <a href="#" class="greenbutton" id="voegtoe" onclick="voegVeldenToe()">Voeg toe</a>
                <a href="#" class="greenbutton" onclick="remove()">Verwijder</a>
                </section>
                <section>
                <h3>Apparaten</h3>
                <h3>naam</h3>
                <h3>Gewicht</h3>
                
                <div id="extraveld"> </div>
        

                </section>

                <select name="rolID" class="rolselect">
                <?php getapparatenlist()?>
                </select>
    </form>
    


  </div>


  </div>


  <?php
include_once 'footer.php';
?>