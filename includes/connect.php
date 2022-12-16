<?php
try {
$servername = "localhost";
$dbname = "green";
$username = "root";
$password = "root";
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


