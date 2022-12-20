<?php
include 'functions.php';





if(!empty($_POST)){
   deleteonder();
   header("Location: ../onderdelen.php");
   
  


}  else{
    echo "kan niet";
}
