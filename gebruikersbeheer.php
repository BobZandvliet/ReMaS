<?php
include 'header.php';
?>
<head><title>gebruikersbeheer</title></head>

<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">



    <table>
        <thread>
        <tr>
        <th>ID</th>
        <th>naam</th>
        <th>rolID</th>
        <th>emailadres</th>
        </tr>
        </thread>
    <?php

    getusers();
    
    
    ?>
    </table>
    </div>
</div>

<?php
include 'footer.php';
?>