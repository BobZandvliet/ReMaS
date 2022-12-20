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
    <input id="but" type="button" value="Print" onclick="printUsers()">
    </div>

    

    
</div>




<?php
include 'footer.php';
?>