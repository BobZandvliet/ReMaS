<?php
        //include 'connect.php';


        function addUser($newData){
        include 'connect.php';

            // prepare sql and bind parameters
            $stmt = $db->prepare("INSERT INTO users(fName, lName, uName, Password, eMail, Phone, City, zCode)      
            VALUES(:fName, :lName, :uName, :Password, :eMail, :Phone, :City, :zCode)");
            
            $stmt->bindParam(':fName' , $fName);
            $stmt->bindParam(':lName' , $lName);
            $stmt->bindParam(':uName' , $uName);
            $stmt->bindParam(':Password' , $Password);
            $stmt->bindParam(':eMail' , $eMail);
            $stmt->bindParam(':Phone' , $Phone);
            $stmt->bindParam(':City' , $City);
            $stmt->bindParam(':zCode' , $zCode);
        
            // insert into row
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $uName = $_POST["uName"];
            $Password = $_POST["Password"];
            $eMail = $_POST["eMail"];
            $Phone = $_POST["Phone"];
            $City = $_POST["City"];
            $zCode = $_POST["zCode"];
            $stmt->execute();

            echo "success ";
        header('Location: ..\usercreated.php');
        }
        
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
                  if(isset($_POST["uName"])){  
                    
                      if(empty($_POST["uName"]) || empty($_POST["Password"])){  
                            $message = '<label>All fields are required</label>';  
                          
                      }  
          
                      else {  
                            $query = "SELECT * FROM users WHERE uName = :uName AND Password = :Password";  
                            $statement = $connect->prepare($query);  
                            $statement->execute(  
                                array(  
                                      'uName' => $_POST["uName"],  
                                      'Password' => $_POST["Password"]  
                                ) );
          
                            
                            $count = $statement->rowCount();  
                            if($count > 0){  
                                
                                $_SESSION["uName"] = $_POST["uName"];  
                                //$_SESSION["Password"] = $_POST["Password"];
                               
                                header("location:../login_succes.php");  
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
          
        //     $stmt = $db->prepare("SELECT * FROM users WHERE uName = :uName");
            
        //     $stmt->bindValue(':uName', $userData);
        //     $stmt->execute();
            
        //     $result = $stmt->fetch(PDO::FETCH_OBJ);
            
        //     if(empty($result)){
        //         $result = false;
        //     }else {
        //         $status = password_verify($userData['Password'], $result->password);
        //     if($status === false){
        //         $result = $status;
        //     }
        //     }
        //     var_dump($result);
        //     return $result;
            
          
          
        //   }


?>

