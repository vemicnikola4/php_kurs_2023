<?php
date_default_timezone_set('Europe/Belgrade'); 
echo "<p>***zad 1***</p>";
// Za uneto vreme u satima i minutima, izračunati koliko minuta je prošlo od ponoći 
$sati = 21;
$min = 50;
$vremena_proslo = ( $sati * 60 ) + 50;
echo "<p>Za uneto vreme u satim i minutima mozemo za kljuciti da je $vremena_proslo minuta proslo od ponoci.</p>";
echo "<br>";

echo "<p>***zad 2***</p>";
// Za uneto vreme u satima i minutima, izračunati koliko minuta je prošlo od ponoći 
$sati = date('H');
$minuti = date('i');

$vremena_proslo = ( $sati * 60 ) + $minuti ;
echo "<p>Za uneto vreme u satim i minutima mozemo za kljuciti da je $vremena_proslo minuta proslo od ponoci.</p>";
echo "<br>";

echo "<p>***zad 5***</p>";
// Konverzija kursa iz dolara u evre, ako znamo dinarsku protivvrednost dolara i dinarsku protivvrednost evra 

$dolari = 250;
$dol_din_k = 105.7926;
$eur_din_k = 117.2923;

$euro = ($dol_din_k * $dolari )/$eur_din_k;

echo  "<p> $dolari dolara je " .number_format($euro,2,'.',',') ."</p>";

// $a = 5899;
// $prva_cifra = floor( $a / 1000 );
// $druga_cifra = floor($a  / 100) - $prva_cifra * 10;
// $treca_cifra =(( $a % 100 ) - ( $a % 10)) / 10;
// $cetvrta_cifra = $a % 10;
// echo "<p>$prva_cifra</p>";
// echo "<p>$druga_cifra</p>";
// echo "<p>$treca_cifra</p>";
// echo "<p>$cetvrta_cifra</p>";
// if ( $prva_cifra == $cetvrta_cifra && $druga_cifra == $treca_cifra ){
//     echo "<p>Broj je palindrom</p>";
// }else{
//     echo "<p>Broj nije palindrom</p>";
// }
?>