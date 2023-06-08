<?php

//implements vs extends
//implements is for when you're implementing an interface. Here is a good place to start: Interfaces and Inheritance. And extends is also for when you're extending an interface :-). A class can only "implement" an interface. A class only "extends" a class. Likewise, an interface can extend another interface. A class can only extend one other class.
//interface je skup javnih metoda.
//u class_automobil.php smo vec require class_vozilo.php pa tako ovde imamo dostupna oba ta fajla
require_once "class_automobil.php";

// Bez getera i setera dok je u osn klasi sve bilo public
// $v = new Vozilo("");
// // $v -> boja ="Crvena";
// // $v -> tip ="BMW";
// echo "<p> Vozilo ".$v->tip." , Boja ".$v->boja."</p>"; 
// $v -> voziVozilo();

// $a = new Automobil;
// $a->boja ="Plava";
// $a->tip ="Peugeout";

// echo "<p>Automobil ".$a->tip." , Boje ".$a->boja."</p>";
// $a -> voziVozilo();
// $a -> voziAutomobil();

$v = new Vozilo ( "Plava", "Opel Caravan");
$v -> voziVozilo();

//nema veze sto class Automobil nema konstruktor u ovom delu jer onnasledjuje konstruktor od class Vozilo;
//Nema veze sto su u klasi Voz polja privatna
$a = new Automobil( "Zuta", "Reno Clio" );
$a -> voziAutomobil();

?>