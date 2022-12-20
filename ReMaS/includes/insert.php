<?php
include 'functions.php';





if(!empty($_POST)){
    $results = lookupUser($_POST['naam']);
    if(empty($results)){
        addUser($_POST);
        echo "Gebruiker toegevoegd";
    } else{
        echo "gebruiksnaam bestaad al";
    }



};