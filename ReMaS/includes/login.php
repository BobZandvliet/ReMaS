<?php  
 session_start();  
 
 include 'functions.php';

//  function doLogin(){
//   include 'connect.php';


// doLogin($_POST);
  





 //check if post is not empty
 if(!empty($_POST)){
    //converts all text to normal html text for safety
    array_walk_recursive($_POST, function($key, &$value){
        $_POST[$key] = htmlentities($value);
    });
 //look up uName by seeing if $result is empty, $result comes from the functions.php
   $result = lookupUser($_POST['naam']);
   if(!empty($result)){
     doLogin($_POST);
     session_start();
    // var_dump($result);
 
   } else {
    header("Location: ../index.php?errorpw");

   }
   
 }
 
 

 ?>  





