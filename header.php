 <?php
include 'includes/functions.php';
session_start();

var_dump(session_status());
var_dump(session_id());
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
    <p>Remas Superior Waste recycling</p>

    <div> 
      Versie: 1.00 
      <?php
      if($_SESSION){
      echo 'Ingelogt als ' . 
      $_SESSION['naam'];
      echo '<a href="logout.php"><img src="content/images/button.png" alt=""></a>';

      }
      ?>
      </div>

  </header>