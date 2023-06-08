<?php
require_once "zbirka_zadataka.php";
require_once "udzbenik.php";
// U fajlu index.php kreirati jedan udžbenik i jednu zbirku zadataka, i pozvati
// metode stampa() i jedinicnaCena() za ova dva objekta.

// $naslov, $brojStrana, $cena ,$tiraz
$u1 = new Udzbenik("Matematika za prvi razred",312,1200,1000 );
echo "<p>Jedinicna cena za udzbenik:</p>";
echo $u1->jedinicnaCena();
$u1 -> stampa();
// $naslov, $brojStrana, $cena,$brojZadataka
$z1 = new ZbirkaZadataka("Matematika zbirka za prvi razred",120,900,500);

echo "<p>Jedinicna cena za zbirku:</p>";
echo $z1->jedinicnaCena();
$z1 ->stampa();
?>