<?php

        //function to check if user name is already taken, if username exists it places it in $result.
        function lookupUser($userData){
            include 'connect.php';
          
            $stmt = $db->prepare("SELECT * FROM medewerkers WHERE naam = :naam");
          
            $stmt->bindValue(':naam', $userData);
           
            $stmt->execute();
          
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
            return $results;
          
          }

   
        function doLogin(){
            include 'connect.php';

            $message = "";  
            try  
            {  
                $connect = $db;  
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                   

                    





                      
                      if(isset($_POST["naam"]) && isset($_POST["wachtwoord"])){  
                               


                            $query = "SELECT * FROM medewerkers WHERE naam = :naam AND wachtwoord = :wachtwoord";  
                            $statement = $connect->prepare($query);  

                            
                            $statement->execute(array('naam' => $_POST["naam"], 'wachtwoord' => $_POST["wachtwoord"]));
                           
                            $count = $statement->rowCount();  

                            if($count > 0){  

                                
                                $_SESSION["naam"] = $_POST["naam"];  
                                // $_SESSION["wachtwoord"] = $_POST["wachtwoord"];



                                addinfo();
                                header("location:../index.php");  }  else {  
                              header("location:../index.php?errorpw");
                            }  } else {  
                        header("location:../index.php?errorpw");}  
                }
                catch(PDOException $error) {  
                  $message = $error->getMessage();  
                  echo "cannot not connect to DB";
                  
            }  
          }

          // function pwcheck()
          // {

          //   include 'connect.php';
          //     if(isset($_POST['wachtwoord'])){
          //       $stmt = $db->query("SELECT * FROM medewerkers WHERE naam = :naam");
          //       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //       $stmt->execute();
          //       foreach($stmt as $row => $pw){
          //         if($pw['naam' == $_POST['naam']]){
          //           $hashedpw = $pw['wachtwoord'];
          //           if(password_verify($_POST['wachtwoord'], $hashedpw)){
          //             return true;
          //           }else {
          //             echo 'gg';
          //           }
          //         } echo 'g';


          //     }
          //   }echo 'nopw';
          // }


          function addinfo(){
            include 'connect.php';
            if(isset($_SESSION['naam'])){
              

              $stmt = $db->query("SELECT * FROM medewerkers");
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $stmt->execute();

              foreach($stmt as $row => $row2){
                  if($row2['naam'] == $_SESSION['naam']){
                    $_SESSION['ID'] = $row2['ID'];
                    $_SESSION["rolID"] = $row2['rolID'];
                    $_SESSION["emailadres"] = $row2['emailadres'];


                }
               
            }
          }
        }


          function getroles(){
            include 'connect.php';
            $stmt = $db->query("SELECT * FROM rollen");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            ?>
            <pre><?php
            // var_dump($results);
            ?>
            </pre>
            <?php
            $stmt->execute();
            
            foreach($stmt as $row){
        
              echo $row['naam'] , "</br>";
            }
          }


          function getusers(){
            include 'connect.php';
            $stmt = $db->query("SELECT * FROM medewerkers");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            ?>
            <pre><?php
            // var_dump($results);
            ?>
            </pre>
            <?php
            $stmt->execute();
            
            foreach($stmt as $row){
        
              echo $row['naam'] , "</br>";
            }



          }




          function addUser(){
            include 'connect.php';
                
                
                // prepare sql and bind parameters
                $stmt = $db->prepare("INSERT INTO medewerkers(rolID, naam, wachtwoord, emailadres)      
                VALUES(:rolID, :naam, :wachtwoord, :emailadres)");

                $rolID = $_POST["rolID"];
                $naam = $_POST["naam"];
                // $wachtwoord = $_POST["wachtwoord"];
                $wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);

                $emailadres = $_POST["emailadres"];



                $stmt->bindParam(":rolID" , $rolID);
                $stmt->bindParam(":naam" , $naam);
                $stmt->bindParam(":wachtwoord" , $wachtwoord, PDO::PARAM_STR);
                $stmt->bindParam(":emailadres" , $emailadres);

            
                // insert into row
               


                $stmt->execute();
    
                echo "success ";
            
            }
 
          














?>

