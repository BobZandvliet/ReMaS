<?php
include 'header.php';
?>
<head><title>Register</title></head>

<div class="mainpage">
    <?php include 'blocks/leftmenu.php';?>


    <div class="page">

    <?php

if($_SESSION['rolID'] == 6){
?>
    <div class="page">


<div  id="page">
<table>
    <thread>
  
    <tr>
    <th>Medewerkers ID</th>
    <th>Medewerkers naam</th>
    <th>Rol ID</th>
    <th>Rol</th>
    <th>email</th>
    </tr>
    </thread>
<?php

    showmedewerkers();


?>
</table>
</div>
  <form class="logform" action="includes/insert.php" method="POST">

                <select name="rolID" class="rolselect">
                  <option value="1">Algemene Medewerker</option>
                  <option value="2">Medewerker Inname</option>
                  <option value="3">Medewerker Verwerking</option>
                  <option value="4">Medewerker Uitgifte</option>
                  <option value="5">Applicatie-beheerder</option>
                  <option value="6">Administrator</option>
                </select>
                <!-- <input type="text" name="rolID" placeholder="rolID" required><br> -->
                <input type="text" name="naam" placeholder="Gebruikersnaam" required><br>
            
                <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>

                <input type="text" name="emailadres" placeholder="emailadres" required><br>

                <input id="but" type="submit" name="submit" value="Submit">

          </form>
         <?php
        }?> 
       <form class="logform" action="includes/deleteuser.php" method="post">

        <h1>Medewerker verwijderen</h1>
        <input type="text" name="ID" placeholder="Medewerkers ID" required><br>


        <input id="but" type="submit" name="delete" value="DELETE">

        </form>
    </div>
</div>

<?php
include 'footer.php';
?>