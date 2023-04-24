<?php
date_default_timezone_set("Europe/Belgrade");
// zad 8. Preuzeti koji je dan u nedelji sa računara i ispitati da li je to radni dan ili je u pitanju vikend.
echo "<p>***Zadatak 8***</p>";

$danasnji_dan = date('N');
//php moze da uporedjuje vrednost "5" i 5;
if ( $danasnji_dan > 5){
    echo "<p>Vikend je.</p>";
}else{
    echo "<p>Radni je dan.</p>";
}
//stefanovo resenje
echo "<p>****Stefanovo resenje****<p>";
$danasnji_dan_s = date('w');//za razliku od N vraca 0-6 za pon-ned

if ( $danasnji_dan_s < 4){
    echo "<p>Vikend je.</p>";
}else{
    echo "<p>Radni je dan.</p>";
}


//  zad 9. Za vreme preuzeto sa računara ispisati 
// dobro jutro za vreme manje od 12 sati ujutru, 
// dobar dan za vreme manje od 18 sati popodne i u ostalim slučajevima ispisati dobro veče.
echo "<hr>";
echo "<p>***Zadatak 9***</p>";

$tren_vreme = date('H');

if ( $tren_vreme < 12){
    echo "<p>Dobro jutro</p>";
}elseif($tren_vreme < 18){
    echo "<p>Dobar dan.</p>";
}else{
    echo "<p>Dobro vece.</p>";
}


//  zad 10. Uporediti dva uneta datuma i ispisati koji od njih je raniji.(preko 6 promenjivih uporediti)
echo "<hr>";
echo "<p>***Zadatak 10***</p>";

$dan_1 = 1;
$mesec_1 = 5;
$godina_1 = 2001;

$dan_2 = 12;
$mesec_2 = 5;
$godina_2 = 2013;

if ( $godina_1 > $godina_2){
    echo "<p>$dan_2/$mesec_2/$godina_2 je raniji datum u odnosu na $dan_1/$mesec_1/$godina_1</p>";
}elseif( $godina_1 < $godina_2 ){
    echo "<p>$dan_1/$mesec_1/$godina_1 je raniji datum u odnosu na $dan_2/$mesec_2/$godina_2</p>";
}elseif ( $mesec_1 > $mesec_2){
    echo "<p>$dan_2/$mesec_2/$godina_2 je raniji datum u odnosu na $dan_1/$mesec_1/$godina_1</p>";
}elseif ( $mesec_1 < $mesec_2){
    echo "<p>$dan_1/$mesec_1/$godina_1 je raniji datum u odnosu na $dan_2/$mesec_2/$godina_2</p>";
}elseif ( $dan_1 > $dan_2){
    echo "<p>$dan_2/$mesec_2/$godina_2 je raniji datum u odnosu na $dan_1/$mesec_1/$godina_1</p>";
}elseif ( $dan_1 < $dan_2){
    echo "<p>$dan_1/$mesec_1/$godina_1 je raniji datum u odnosu na $dan_2/$mesec_2/$godina_2</p>";
}else{
    echo "<p>Datumi su isti</p>";
}

// zad 11. Radno vreme jedne programerske firme je od 9h do 17h. Preuzeti vreme sa računara i ispitati da li u to vreme firma radi ili ne radi.
echo "<hr>";
echo "<p>***Zadatak 11***</p>";

$trenutno_vreme = date('H');


if ( $trenutno_vreme < 9){
    echo "<p>Trenutno je ".date("H:i")."h firma ne radi</p>";
}elseif( $trenutno_vreme < 17 ){
    echo "<p>Vama na usluzi firma radi do 17h</p>";
}else{
    echo "<p>Trenutno je ".date("H:i")."h firma ne radi. Radno vreme firme je do 17h.</p>";
}

//zad 12. Za unet početak i kraj radnog vremena dva lekara ispisati DA ukoliko se njihove smene preklapaju, u suprotnom ispisati NE.
echo "<hr>";
echo "<p>***Zadatak 12***</p>";
$p_1 = 9;
$k_1 = 13;
$p_2 = 13;
$k_2 = 22;
if ( $p_1 >= $k_2){
    echo "<p>NE</p>";
}elseif( $p_2 >= $k_1){
    echo "<p>NE</p>";
}else{
    echo "<p>DA</p>";
}
// zad 13. Za uneti broj ispitati da li je paran ili nije.
echo "<hr>";
echo "<p>***Zadatak 13***</p>";

$n = 14;

if ( $n % 2 == 0){
    echo "<p>$n je paran broj. </p>";
}else{
    echo "<p>$n je neparan broj. </p>";
}
echo "<hr>";
echo "<p>***Zadatak 15***</p>";
// Za dva uneta broja, od većeg učitanog broja oduzeti manji i rezultat ispisati na ekranu.
$a = 44;
$b = 55;

if ( $a > $b ){
    echo $a - $b;
}elseif($a < $b){
    echo $b - $a;
}else{
    echo "<p>$a je jednak $b</p>";
}

echo "<hr>";
echo "<p>***Zadatak 16***</p>";
// Za uneti broj ispitati da li je on manji ili veći od nule. Ukoliko je manji ili jednak nuli ispisati njegov prethodnik, a ukoliko je veći od nule ispisati njegov sledbenik.

if ( $a <= 0){ 
    echo $a - 1;
}else{
    echo $a + 1;
}
echo "<hr>";
echo "<p>***Zadatak 17***</p>";
// Za tri uneta broja ispisati koji od njih ne najveći, koji od njih je srednji, a koji od nih je najmanji. 
$a = 55;
$b = 68;
$c = 85;

if ( $a < $b){
    $pom = $a;
    $a = $b;
    $b = $pom;
}
if ( $a < $c){
    $pom = $a;
    $a = $c;
    $c = $pom;
}
if ( $b < $c ){
    $pom = $b;
    $b = $c;
    $c = $pom;
}
echo "<p>Najveci $a srednji $b najmanji $c</p>";

echo "<p>***Stefanovo resenje***</p>";

$max = $a;
if ( $max < $b ){
    $max = $b;
}
if ( $max < $c ){
    $max = $c;
}
$min = $a;
if ( $min > $b ){
    $min = $b;
}
if ( $min > $c ){
    $min = $c;
}
$sr = $a + $b +$c - ( $min + $max );
echo "<p>$max >= $sr >= $min</p>";
echo "<hr>";
echo "<p>***zad 13***</p>";
