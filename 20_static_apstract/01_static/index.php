<?php
require_once "klasa_krug_2.php";



$krug1 = new Krug ( 10 );//$krug1 -> r = 10;
$krug1 -> setPi(3.14159);

$povrsinaKrug1 = $krug1 -> povrsinaKruga();// $krug1 -> r * $krug1 -> 4 * 3.14
$obimKrug1 = $krug1 -> obimKruga();//$krug1 ->r * 2 * 3.14
$poluprecnik1= $krug1 -> getR();
echo "<p> Povrsina kruga ciji je poluprecnik $poluprecnik1 je  $povrsinaKrug1</p>"; 
echo "<p> Obim kruga ciji je poluprecnik $poluprecnik1 je  $obimKrug1</p>"; 

$krug1 -> setPi(3.14159);//ovako postavimoako je public polje


//Polup se menja u zavisnosti od objekta a ovo pi se ne menja. 
// Jasno je dapi treba da se nadje u klasi krug te ima smisla da bude unutar klase
//Niko nam ne brani da pi definisemo izvan klase

$krug2 = new Krug ( 15 );
$povrsinaKrug2 = $krug2 -> povrsinaKruga();
$obimKrug2 = $krug2 -> obimKruga();
$poluprecnik2= $krug2 -> getR();
echo "<p> Povrsina kruga ciji je poluprecnik $poluprecnik2 je  $povrsinaKrug2</p>"; 
echo "<p> Obim kruga ciji je poluprecnik $poluprecnik2 je  $obimKrug2</p>"; 


$krug3 = new Krug ( 47 );
$povrsinaKrug3 = $krug3 -> povrsinaKruga();
$obimKrug3 = $krug3 -> obimKruga();
$poluprecnik3= $krug3 -> getR();
echo "<p> Povrsina kruga ciji je poluprecnik $poluprecnik3 je  $povrsinaKrug3</p>"; 
echo "<p> Obim kruga ciji je poluprecnik $poluprecnik3 je  $obimKrug3</p>"; 

//echo Krug:PI cak i ako nemamo objekat mi mozemo da pozovemo konstantu izvan klase i da je ehujemo.
echo "<hr>";
echo "<p>Broj krugova do sada je ".Krug::getBrojKrugova( )."</p>";
$krug4 = new Krug ( 10 );
$krug4 -> setBrojDecimala ( 1 );
echo $krug4 -> obimKruga();

echo "<hr>";
echo "<p>Broj krugova do sada je ".Krug::getBrojKrugova( )."</p>";
$krug5 = new Krug ( 15 );
$krug5 -> setBrojDecimala ( 1 );
echo $krug5 -> obimKruga();
?>
?>
