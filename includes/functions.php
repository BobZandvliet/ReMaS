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
                               


                            $query = "SELECT * FROM medewerkers WHERE naam = :naam";  
                            $statement = $connect->prepare($query);  

                            
                            $statement->execute(['naam' => htmlspecialchars($_POST["naam"], ENT_QUOTES, 'UTF-8')]);
                           
                            $count = $statement->rowCount();  

                            if($count > 0){  
                              $data = $statement->fetch(PDO::FETCH_ASSOC);
                                if(password_verify($_POST["wachtwoord"], $data["wachtwoord"])){

                                $_SESSION["naam"] = $_POST["naam"];  
                                $_SESSION['ID'] = $data['ID'];
                                $_SESSION["rolID"] = $data['rolID'];
                                $_SESSION["emailadres"] = $data['emailadres'];
                                


                                }
                                else{
                                  header("location:../index.php?errorpw");
                                }
                                header("location:../index.php");  }  
                                else {  
                              header("location:../index.php?errorpw");
                            }  } 
                            else {  
                        header("location:../index.php?errorpw");}  
                }
                catch(PDOException $error) {  
                  $message = $error->getMessage();  
                  echo "cannot not connect to DB";
                  
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
  
  
                  echo '<tr> <td>' .$row['ID'] . '</td>';
                  echo '<td>' . $row['naam'] . '</td>' ;
                  if($row['rolID'] == 1){
                    echo '<td>' . "Algemeen medewerker" . '</td>' ;
                  }
                  if($row['rolID'] == 2){
                    echo '<td>' . "Medewerker inname" . '</td>' ;
                  }
                  if($row['rolID'] == 3){
                    echo '<td>' . "Medewerker verwerking" . '</td>' ;
                  }
                  if($row['rolID'] == 4){
                    echo '<td>' . "Medewerker uitgifte" . '</td>' ;
                  }
                  if($row['rolID'] == 5){
                    echo '<td>' . "Applicatie beheerder" . '</td>' ;
                  }
                  if($row['rolID'] == 6){
                    echo '<td>' . "Administrator" . '</td>' ;
                  }
                  // echo '<td>' . $row['rolID'] . '</td>' ;
                  echo '<td>' .$row['emailadres'] . '</td> </tr>';
        
              }
            
            }
          

            function getonderdelen(){
              include 'connect.php';
              $stmt = $db->query("SELECT * FROM onderdelen");
  
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
              ?>
              <pre><?php
              // var_dump($results);
              ?>
              </pre>
              <?php
              $stmt->execute();
              
              foreach($stmt as $row){
  
  
                  
                  echo '<tr> <td>' .$row['naam'] . '</td>';
                  echo '<td>' . $row['omschijving'] . '</td>' ;
                  echo '<td>' . $row['voorraadkg'] . '</td>' ;
                  echo '<td>' .$row['prijsperkg'] . '</td> </tr>';
                 
        
              }
            
            }


            function addonderdeel(){
              include 'connect.php';
                  
                  
                  // prepare sql and bind parameters
                  $stmt = $db->prepare("INSERT INTO onderdelen(naam, omschijving, voorraadkg, prijsperkg)      
                  VALUES(:naam, :omschijving, :voorraadkg, :prijsperkg)");
  
                 
                  $naam = $_POST["naam"];
                  $omschijving = $_POST["omschijving"];
                  $voorraadkg = $_POST["voorraadkg"];
                  $prijsperkg = $_POST["prijsperkg"];
  
  
                  $stmt->bindParam(":naam" , $naam);
                  $stmt->bindParam(":omschijving" , $omschijving);
                  $stmt->bindParam(":voorraadkg" , $voorraadkg);
                  $stmt->bindParam(":prijsperkg" , $prijsperkg);
  
  
                  $stmt->execute();
      
                  header("Location: ../onderdelen.php");
              
              }
  









?>

