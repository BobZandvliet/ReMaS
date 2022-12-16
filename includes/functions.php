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
                  if(isset($_POST["naam"])){  
                    
                      if(empty($_POST["naam"]) || empty($_POST["wachtwoord"])){  
                            $message = '<label>All fields are required</label>';  
                          
                      }  
          
                      else {  
                            $query = "SELECT * FROM medewerkers WHERE naam = :naam AND wachtwoord = :wachtwoord";  
                            $statement = $connect->prepare($query);  
                            $statement->execute(  
                                array(  
                                      'naam' => $_POST["naam"],  
                                      'wachtwoord' => $_POST["wachtwoord"]  
                                ) );
          
                            
                            $count = $statement->rowCount();  
                            if($count > 0){  
                                
                                $_SESSION["naam"] = $_POST["naam"];  
                                //$_SESSION["wachtwoord"] = $_POST["wachtwoord"];
                               
                                header("location:../index.php");  
                            }  
                            else {  
                                $message = '<label>Wrong Data</label>';  
                            }  
                      }  
                  }  
                }
                catch(PDOException $error) {  
                  $message = $error->getMessage();  
                  echo "asdfasdfs";
            }  
          }





        // function doLogin($userData){
        //     include 'connect.php';
          
        //     $stmt = $db->prepare("SELECT * FROM users WHERE naam = :naam");
            
        //     $stmt->bindValue(':naam', $userData);
        //     $stmt->execute();
            
        //     $result = $stmt->fetch(PDO::FETCH_OBJ);
            
        //     if(empty($result)){
        //         $result = false;
        //     }else {
        //         $status = wachtwoord_verify($userData['wachtwoord'], $result->wachtwoord);
        //     if($status === false){
        //         $result = $status;
        //     }
        //     }
        //     var_dump($result);
        //     return $result;
            
          
          
        //   }


?>

