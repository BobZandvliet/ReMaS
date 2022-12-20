<?php
include 'header.php';
?>
<head><title>Onderhoud</title></head>
<script src="scripts/js.js" defer></script>
<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">
    <h3> Ingelogd als <?= $_SESSION["naam"]?></h3> 

    <div><a href="/apparaten.php">Apparaten</a></div>
    <div ><a href="/onderdelen.php">Onderdelen</a></div>

    

    
</div>




<?php
include 'footer.php';
?>