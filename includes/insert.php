<?php
include 'functions.php';





if(!empty($_POST)){
    array_walk_recursive($_POST, function($key, & $value){
        $_POST[$key] = htmlentities($value);
    });
    $results = lookupUser($_POST['naam']);
    if(empty($results)){
        addUser($_POST);
        echo "Gebruiker toegevoegd";
    } else{
        echo "gebruiksnaam bestaad al";
    }



};