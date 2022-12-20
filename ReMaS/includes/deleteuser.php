<?php
include 'functions.php';





if(!empty($_POST)){
   deleteuser();
   header("Location: ../gebruikersbeheer.php");
   
  


}  else{
    echo "kan niet";
}
