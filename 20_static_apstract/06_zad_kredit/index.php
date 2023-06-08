<?php
require_once "class_auto_kredit.php";
require_once "class_stambeni_kredit.php";

// Takođe, iz klase Kredit izvesti i klasu StambeniKredit koja nema dodatna polja, i sadrži samo svoju verziju metode za računanje mesečne rate po formuli:



$k1 = new AutoKredit ( 12000 , 0, 7, 1.3);
$k2 = new StambeniKredit ( 35000 , 2.5, 25 );
$k3 = new StambeniKredit ( 25000 , 2.5, 30 );
$k4 = new StambeniKredit ( 50500 , 2.3, 35 );
$k5 = new AutoKredit ( 11000 , 2.8, 7, 2 );
$k6 = new StambeniKredit ( 68000 , 2.8, 40 );
$k7 = new AutoKredit ( 12500 , 2.8, 15, 2.5 );

$krediti = [
    $k1, $k2, $k3, $k4, $k5, $k6,$k7
];
foreach ( $krediti as $kredit ){
    $kredit -> ispis();
}
?>