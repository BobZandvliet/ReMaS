<?php
include 'includes/functions.php';
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

// var_dump(session_status());
// var_dump(session_id());
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" type="text/css" href="scripts/style.css">
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  </head>
  <body>
    
  <header>
    <a href="index.php"><h1>Superior Waste</h1></a>
      <div class="formdiv">
        <form class="logform" action="includes/login.php" method="post">

          <label for="naam">Username</label><br>
              <input type="text" name="naam"><br>

          <label for="wachtwoord">wachtwoord</label><br>
              <input type="wachtwoord" name="wachtwoord"><br>

          <input type="submit" name="login" value="Login">

        </form>
      </div>
  </header>