<?php
include 'functions.php';





if(!empty($_POST)){
   deleteappa();
   header("Location: ../apparaten.php");
   
  


}  else{
    echo "kan niet";
}
