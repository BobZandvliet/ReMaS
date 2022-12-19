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
                echo '<tr> <td>' .$row['ID'] . '</td>' . '<td>' .$row['naam'] . '<td>' .$row['rolID'] . '</td>' .  '<td>' .$row['emailadres'] . '</td> </tr>';
                // echo '<tr> <td>' . $row["naam"] . '</td> </tr>';
                //. '<td>' .$row['emailadres'] . '</td>'

            //   echo "<div class='uwrap'>" ,
            //  "<div class='idrow'>" , $row['ID'] , "</div>" ,
            //  "<div class='naamrow'>" , $row['naam'] , "</div>" ,
            //  "<div class='rolrow'>" , $row['rolID'] ,"</div>" ,
            //  "<div class='emailrow'>" , $row['emailadres'] ,"</div>" ,
            //   "</div>";






              // var_dump($row);
              // echo $row['naam'] , "</br>";
              
              // $row['ID'] = $userid;
              // $row['naam'] = $usernaam;
              // $row['rolID'] = $userrol;
              // $row['emailadres'] = $usermail;

              
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

