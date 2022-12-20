<?php
include 'header.php';
?>
<head><title>apparaten</title></head>
<script src="scripts/js.js" defer></script>
<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">


    <div  id="page">
    <table>
        <thread>
        <tr>
            <th>Apparaten</th>
        </tr>    
        <tr>
        <th>Naam</th>
        <th>Omschijving</th>
        <th>Vergoeding</th>
        <th>Voorraad in kg</th>
        </tr>
        </thread>
    <?php

        getapparaten();
    
    
    ?>
    </table>
    </div>
    <input id="but" type="button" value="Print" onclick="printpage()">
    
    <form class="logform" action="includes/addapparaat.php" method="POST">
    <h1>Apparaat toevoegen</h1>
            <input type="text" name="naam" placeholder="Naam" required><br>
            
            <input type="text" name="omschijving" placeholder="Omschijving" required><br>

            <input type="text" name="vergoeding" placeholder="Vergoeding" required><br>

            <input type="text" name="gewichtgram" placeholder="Vooraad in kg" required><br>

            <input id="but" type="submit" name="submit" value="Submit">
            </form>

            <form class="logform" action="includes/deleteappa.php" method="post">

            <h1>Apparaat verwijderen</h1>
            <input type="text" name="naam" placeholder="Apparaat naam" required><br>


            <input id="but" type="submit" name="delete" value="DELETE">

            </form>
    </div>

    

    
</div>




<?php
include 'footer.php';
?>