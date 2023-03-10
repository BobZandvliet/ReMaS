<?php
// dit is mijn functions file waarin alle functies die de website gebruikt vandaan komen
//voor mijn connectie heb ik PDO gebruikt die prepare statements gebruikt voor veiligheid

        //een functie om te kijken of een username al bestaad in de db
        function lookupUser($userData){
            include 'connect.php';
          
            $stmt = $db->prepare("SELECT * FROM medewerkers WHERE naam = :naam");
          
            $stmt->bindValue(':naam', $userData);
           
            $stmt->execute();
          
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
            return $results;
          
          }

          //een login functie die gebruikt maak van password verify om de hashed password te checken met de non hashed password die ingevult wordt
          //in deze funtie wordt ook informatie toegevoegd in de session, deze session wordt daarna gebruikt om bepaalde informatie te laten zien
        function doLogin(){
            include 'connect.php';

            $message = "";  
            try  
            {  
                $connect = $db;  
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //moet naar db function / connect.php
                   

                      if(isset($_POST["naam"]) && isset($_POST["wachtwoord"])){  
                               


                            $query = "SELECT * FROM medewerkers WHERE naam = :naam";  
                            $statement = $connect->prepare($query);  

                            //html special chars voor sql injection tegen te gaan
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
                                  header("location: ../index.php?errorpw");
                                }
                                header("location: ../index.php");  }  
                                else {  
                              header("location: ../index.php?errorpw");
                            }  } 
                            else {  
                        header("location: ../index.php?errorpw");}  
                }
                catch(PDOException $error) {  
                  $message = $error->getMessage();  
                  echo "cannot not connect to DB";
                  
            }  
          }


            //krijgt alle rollen die in de db staan
          function getroles(){
            include 'connect.php';
            $stmt = $db->query("SELECT * FROM rollen");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

            
            foreach($stmt as $row){
        
              echo $row['naam'] , "</br>";
            }
          }


          //funcite om een user aan te maken en het ingevulde wachtwoord te hashen
          function addUser(){
            include 'connect.php';
                
                

                $stmt = $db->prepare("INSERT INTO medewerkers(rolID, naam, wachtwoord, emailadres)      
                VALUES(:rolID, :naam, :wachtwoord, :emailadres)");

                $rolID = $_POST["rolID"];
                $naam = $_POST["naam"];

                $wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);

                $emailadres = $_POST["emailadres"];



                $stmt->bindParam(":rolID" , $rolID);
                $stmt->bindParam(":naam" , $naam);
                $stmt->bindParam(":wachtwoord" , $wachtwoord, PDO::PARAM_STR);
                $stmt->bindParam(":emailadres" , $emailadres);

            
         
               


                $stmt->execute();
    
                header("Location: ../register.php");
            
            }

            //een functie om alle users op te halen uit de db en gelijk html toegevoegd voor styling
            function getusers(){
              include 'connect.php';
              $stmt = $db->query("SELECT * FROM medewerkers");
  
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
              
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
                 
                  echo '<td>' .$row['emailadres'] . '</td> </tr>';
        
              }
            
            }
          
            //krijgt alle onderdelen die in de db staan en voegd html toe voor styling
            function getonderdelen(){
              include 'connect.php';
              $stmt = $db->query("SELECT * FROM onderdelen");
  
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
              foreach($stmt as $row){
  
  
                  
                  echo '<tr> <td>' .$row['naam'] . '</td>';
                  echo '<td>' . $row['omschijving'] . '</td>' ;
                  echo '<td>' . $row['voorraadkg'] . '</td>' ;
                  echo '<td>' .$row['prijsperkg'] . '</td> </tr>';
                 
        
              }
            
            }

            //een functie om onderdelen toe te voegen aan de db
            function addonderdeel(){
              include 'connect.php';
                  
                  
                 
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
      
                  header("Location: ../onderdelen.php");//stuurt je terug naar de pagina /onderdelen.php
              
              }
              //zelfde als getonderdelen maar dan voor alla apparaten in de db
              function getapparaten(){
                include 'connect.php';
                $stmt = $db->query("SELECT * FROM apparaten");
    
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($stmt as $row){
    
    
                    
                    echo '<tr> <td>' .$row['naam'] . '</td>';
                    echo '<td>' . $row['omschijving'] . '</td>' ;
                    echo '<td>' . $row['vergoeding'] . '</td>' ;
                    echo '<td>' .$row['gewichtgram'] . '</td> </tr>';
                   
          
                }
              
              }
              function getapparatenlist(){
                include 'connect.php';
                $stmt = $db->query("SELECT * FROM apparaten");
    
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                
                foreach($stmt as $row){
    
                    
                    echo '<option value="' . $row["ID"]. '" >' .$row['naam'] . '</option>';

                   
          
                }
              
              }

              function addapparaat(){
                include 'connect.php';
                    
                    
                    
                    $stmt = $db->prepare("INSERT INTO apparaten(naam, omschijving, vergoeding, gewichtgram)      
                    VALUES(:naam, :omschijving, :vergoeding, :gewichtgram)");
    
                   
                    $naam = $_POST["naam"];
                    $omschijving = $_POST["omschijving"];
                    $vergoeding = $_POST["vergoeding"];
                    $gewichtgram = $_POST["gewichtgram"];
    
    
                    $stmt->bindParam(":naam" , $naam);
                    $stmt->bindParam(":omschijving" , $omschijving);
                    $stmt->bindParam(":vergoeding" , $vergoeding);
                    $stmt->bindParam(":gewichtgram" , $gewichtgram);
    
    
                    $stmt->execute();
        
                    header("Location: ../apparaten.php");
                
                }

                //functie om een user te verwijderen
                function deleteuser(){
                  include 'connect.php';
                      
                      
      
                      $stmt = $db->prepare("DELETE FROM medewerkers WHERE ID = :ID");
      
                      $ID = $_POST["ID"];
                      $stmt->bindParam(":ID" , $ID);
         
                      $stmt->execute();
          
                      
                  }
                  function deleteappa(){
                    include 'connect.php';
                        
                        
        
                        $stmt = $db->prepare("DELETE FROM apparaten WHERE naam = :naam");
        
                        $naam = $_POST["naam"];
                        $stmt->bindParam(":naam" , $naam);
           
                        $stmt->execute();
            
                        
                    }
                    function deleteonder(){
                      include 'connect.php';
                          
                          
          
                          $stmt = $db->prepare("DELETE FROM onderdelen WHERE naam = :naam");
          
                          $naam = $_POST["naam"];
                          $stmt->bindParam(":naam" , $naam);
             
                          $stmt->execute();
              
                          
                      }


                      // een functie die gebruikt maakt van de left outer join om met een relationele database informatie uit meerdere tabbelen te halen en samen te voegen
                      function showmedewerkers(){
                        include 'connect.php';
                                       
                            $stmt = $db->prepare("SELECT medewerkers.ID, medewerkers.naam AS medewerkersNaam, medewerkers.rolID, medewerkers.emailadres, 
                            rollen.naam AS rolNaam FROM medewerkers 
                            LEFT OUTER JOIN rollen 
                            ON medewerkers.rolID = rollen.ID;");
                            
                            // var_dump($stmt);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // echo'<pre>';
                            // var_dump($results);
                            // echo'</pre>';
                            foreach($results as $row){
              
              
                              
                              echo '<tr> <td>' .$row['ID'] . '</td>';
                              echo '<td>' . $row['medewerkersNaam'] . '</td>' ;
                              echo '<td>' . $row['rolID'] . '</td>' ;
                              echo '<td>' .$row['rolNaam'] . '</td> ';
                              echo '<td>' .$row['emailadres'] . '</td> </tr>';
                             
                    
                          }


                        }





















?>

