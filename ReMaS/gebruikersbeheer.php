<?php
include 'header.php';
?>
<head><title>gebruikersbeheer</title></head>
<script src="scripts/js.js" defer></script>
<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">


    <div  id="page">
    <table>
        <thread>
        <tr>
        <th>ID</th>
        <th>naam</th>
        <th>Rol</th>
        <th>emailadres</th>
        </tr>
        </thread>
    <?php

    getusers();
    
    
    ?>
    </table>
    </div>
</br>
  
    <input id="but" type="button" value="Print" onclick="printpage()">
   
    
    <form class="logform" action="includes/deleteuser.php" method="post">

    <h1>Gebruiker verwijderen</h1>
    <input type="text" name="ID" placeholder="Gebruikers ID" required><br>


    <input id="but" type="submit" name="delete" value="DELETE">

    </form>
    </div>
    
</div>




<?php
include 'footer.php';
?>