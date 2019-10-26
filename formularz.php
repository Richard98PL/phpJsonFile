<?php

include_once "pomocnicze.php";

function drukuj_form(){
       include "index.php";
}

drukuj_form();

if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "Dodaj"))
    {
        dodaj();
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "Pokaz"))
    {
        pokazAll();
    }

 if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "OnlyJava"))
    {
        pokazJezyk('java');
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "OnlyPHP"))
    {
        pokazJezyk('php');
    }
    
if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "OnlyCPP"))
    {
        pokazJezyk('cpp');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and FILTER_INPUT(INPUT_POST, "Stats"))
    {
        showStats();
    }

?>
    
