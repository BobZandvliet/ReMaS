<?php
include 'header.php';
?>
<head><title>onderdelen</title></head>
<script src="scripts/js.js" defer></script>
<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">


    <div  id="page">
    <table>
        <thread>
        <tr>
            <th>Onderdelen</th>
        </tr>    
        <tr>
        <th>Naam</th>
        <th>Omschijving</th>
        <th>Verkoopprijs per kg</th>
        <th>Voorraad(kg)</th>
        </tr>
        </thread>
    <?php

    getonderdelen();
    
    
    ?>
    </table>
    </div>
    <input id="but" type="button" value="Print" onclick="printpage()">
    
    <form class="logform" action="includes/addonderdeel.php" method="POST">
    <h1>Onderdeel toevoegen</h1>
            <input type="text" name="naam" placeholder="Naam" required><br>
            
            <input type="text" name="omschijving" placeholder="Omschijving" required><br>

            <input type="text" name="voorraadkg" placeholder="Voorraad in kg" required><br>

            <input type="text" name="prijsperkg" placeholder="Verkoopprijs per kg" required><br>

            <input id="but" type="submit" name="submit" value="Submit">
            </form>

            
            <form class="logform" action="includes/deleteonder.php" method="post">
            <h1>Onderdeel verwijderen</h1>
            
            <input  type="text" name="naam" placeholder="Onderdeel naam" required><br>


            <input id="but" type="submit" name="delete" value="DELETE">

            </form>
    </div>

    

    
</div>




<?php
include 'footer.php';
?>