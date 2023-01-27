<?php
//dit is mijn connect naar de database
try {
$servername = "localhost";
$dbname = "Remas";
$username = "root";
$password = "123Dpower!";
//login to database
  $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8" ,$username,$password);
  //vardump to see if the connection works
//var_dump($db);

} catch(Exception $e) {

  //var_dump($e);//get all the error information
  echo $e->getMessage();// get only the message from $e
  echo" An error her occurred";
  die();

}



 ?>


