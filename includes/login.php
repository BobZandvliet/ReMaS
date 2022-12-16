<?php  

include 'connect.php';

 session_start();  
 

 include 'functions.php';
 
 //check if post is not empty
 if(!empty($_POST)){
 
    //converts all text to normal html text for safety
    // array_walk_recursive($_POST, function($key, &$value){
    //     $_POST[$key] = htmlentities($value);
    // });
 //look up uName by seeing if $result is empty, $result comes from the functions.php
   $result = lookupUser($_POST['naam']);
   if(empty(!$result)){
     doLogin($_POST);
     echo "logged in";
    // var_dump($result);
 
   } else {
     echo "login wrong";
    // var_dump($result);
   }
   
 }
 
 
 

 


// function(){
//   $message = "";  
//   try  
//   {  
//       $connect = $db;  
//       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//         if(isset($_POST["uName"])){  
          
//             if(empty($_POST["uName"]) || empty($_POST["Password"])){  
//                   $message = '<label>All fields are required</label>';  
                
//             }  

//             else {  
//                   $query = "SELECT * FROM users WHERE uName = :uName AND Password = :Password";  
//                   $statement = $connect->prepare($query);  
//                   $statement->execute(  
//                       array(  
//                             'uName'     =>     $_POST["uName"],  
//                             'Password'     =>     $_POST["Password"]  
//                       ) );

                  
//                   $count = $statement->rowCount();  
//                   if($count > 0){  
//                       $_SESSION["uName"] = $_POST["uName"];  
//                       header("location:../login_succes.php");  
//                   }  
//                   else {  
//                       $message = '<label>Wrong Data</label>';  
//                   }  
//             }  
//         }  
//       }
//       catch(PDOException $error) {  
//         $message = $error->getMessage();  
//         echo "asdfasdfs";
//   }  
// }

 ?>  





