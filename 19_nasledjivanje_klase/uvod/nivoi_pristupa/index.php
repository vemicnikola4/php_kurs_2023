<?php
// require_once "vozilo.php";
require_once "automobil.php";

//Konstruktor pristupa svim poljima od priv prot do public
$v = new Vozilo ("a" , "b" ,"c");

$v -> ispis();
//Ne moze private atributu ili metodama;
// echo $v -> privatnoPolje;

//Ne moze ni potected atributu ili metodama;
// echo $v ->zasticenoPolje;

//Ne moze private atributu ili metodama;
echo $v ->javnoPolje;

$a = new Automobil ( "d" , "e","f",5);
$a -> ispis();
$a -> ispisAuto();

?>