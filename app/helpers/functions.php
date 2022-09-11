<?php 
function splitName($name){
    $name = trim($name);
    $nameArray=explode(" ",$name);
    $firstName=$nameArray[0];
    $lastName=$nameArray[1];
    return array($firstName,$lastName);
}