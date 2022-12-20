<?php
include 'functions.php';

// var_dump($_POST);
// die("dd");
if(!empty($_POST)){

        addapparaat($_POST);
        echo "apparaat toegevoegd";
    } else{
        echo "apparaat bestaad al";
    }

