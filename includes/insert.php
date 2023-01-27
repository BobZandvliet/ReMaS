<?php
include 'functions.php';





if(!empty($_POST)){
    $results = lookupUser($_POST['naam']);//gerbuikt de funcite lookupuser om te kijken of een user bestaad voordat de er iets gebeurd
    if(empty($results)){
        addUser($_POST);
        echo "Gebruiker toegevoegd";
    } else{
        echo "gebruiksnaam bestaad al";
    }



};