<?php

// $cars = array ( "BMW","VOLVO","TOYOTA");
$cars =["BMW","VOLVO","TOYOTA"];//elementi ovog niza su BMW VOLVO I TOYOTA a indexi el ovog niza su 0 , 1 , 2.

var_dump( $cars );//detaljnije prikazuje i tip podatka pored echo print_r i var_dump su prikazi
echo "<hr>";

print_r( $cars );
echo "<hr>";
//pristupanje elemntima
echo "<p>Prvo slovo prvog clana niza " .$cars[0][0]. " </p>";
$car_1 = $cars[0];
// echo $cars[0][0];Prvo slovo prvog elementa niza;
echo "<hr>";
echo $car_1;
echo "<hr>";
$prvi_element = $cars[0];
$drugi_element = $cars[1];
$treci_element = $cars[2];
echo "$prvi_element, $drugi_element, $treci_element";
//izmena elemenata
$cars[1] = "PEUGEOT";
echo "<hr>";
$prvi_element = $cars[0];
$drugi_element = $cars[1];
$treci_element = $cars[2];
echo "$prvi_element, $drugi_element, $treci_element";
$cars[10] = "AUDI";//ukoliko na trazenoj poziciji postoji element on ga menja a kada ne postoji on takav element dodaje u niz.
///UTF 8 za substr sa nasim slovima.
echo "<hr>";

$polaznici = [];
//array_push moze da doda vise elemenata od jednom na kraj.
$polaznici[]= "Aleksandar";//$polaznici[] dodaje na kraj niza;
$polaznici[]= "Uros";
$polaznici[]= "Milijana";
var_dump($polaznici);
$duzina = count( $polaznici );
echo "<p>U nizu ima $duzina polaznika.</p>";
echo "<hr>";

for ( $i = 0; $i < count( $polaznici ); $i++ ){
    echo $polaznici[$i]. " ; ";
}
?>
