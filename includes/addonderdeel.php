<?php
include 'functions.php';

// var_dump($_POST);
// die("dd");
if(!empty($_POST)){

        addonderdeel($_POST);
        echo "Gebruiker toegevoegd";
    } else{
        echo "gebruiksnaam bestaad al";
    }

