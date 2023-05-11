<?php
echo "<p>***zad 1.***</p>";
// Ispisati brojeve od 1 do 20.
for ( $i = 1 ; $i <= 20; $i++){
    echo $i.",";
}

echo "<p>***zad 2.***</p>";
// Ispisati brojeve od 20 do 1.
for ( $i = 20 ; $i >= 1; $i--){//se dok je $i >= 1
    echo $i.",";
}

echo "<p>***zad 3.***</p>";
// Ispisati parne brojeve od 20 do 1.

for ( $i = 2 ; $i <= 20; $i+=2){
    echo $i.",";
}

echo "<p>***zad 4.***</p>";
// Ispisati dvostruku vrednost brojeva  od 5 do 15. *.
for ( $i = 5 ; $i <= 15; $i++ ){
    $b = $i * 2;
    echo $b.",";
}
echo "<p>***zad 5.***</p>";
// Odrediti sumu brojeva od 1 do 100.
$sum = 0; 
for ( $i = 1 ; $i <= 100; $i++ ){
    $sum += $i; 
}
echo "<p> Suma brojeva od 1 do 100 je $sum</p>";

echo "<p>***zad 6.***</p>";
// Odrediti sumu brojeva od 1 do $n. 
$n = 50;
$sum = 0;
for ( $i = 1 ; $i <= $n; $i++ ){
    $sum += $i; 
}
echo "<p> Suma brojeva od 1 do $n je $sum</p>";

echo "<p>***zad 7.***</p>";
// Odrediti sumu brojeva od $n do $m.
$n = 1;
$m = 50;

$sum = 0;

for ( $i = $n ; $i <= $m; $i++ ){
    $sum += $i; 
}
echo "<p> Suma brojeva od $n do $m je $sum</p>";

echo "<p>***zad 8.***</p>";
//Odrediti proizvod brojeva od $n do $m. *
$n = 2;
$m = 5;

$proizvod = 1;

for ( $i = $n ; $i <= $m; $i++ ){
    $proizvod *=  $i; 
}
echo "<p> Proizvod brojeva od $n do $m je $proizvod</p>";

echo "<p>***zad 9.***</p>";
//Odrediti sumu kvadrata brojeva od n do m *

$n = 2;
$m = 3;
$sum_kv = 0;
$proizvod = 1;
for ( $i = $n ; $i <= $m; $i++ ){
    $proizvod = $i * $i; 
    $sum_kv += $proizvod;
}
echo "<p> Suma kvadrata brojeva od $n do $m je $sum_kv</p>";

echo "<p>***zad 10.***</p>";
//Preuzeti sa interneta tri slike i imenovati ih 1, 2 i 3. For petljom prikazati naizmenično te tri slike $n puta 
//(na ekranu treba biti ukupno $n sličica). *
$n = 7;
for ( $i = 0 ; $i < $n; $i++ ){
    $j = $i % 3;
    if ( $j == 0 ){
        $j = 3;
    }
    echo "<img src='$j.jpg' alt='slika_$j'>";
}
//nputa ispisi tri slike
echo "<p>***dodatni zad za petlju u petlji.***</p>";
$n = 4;
for ( $i = 0 ; $i < $n; $i++ ){
    echo "<p>";
    for ( $j = 1; $j <= 3; $j++){//ugnjezdena petlja.
        echo "<img src='$j.jpg' alt='slika_$j'>";
    }
    echo "</p>";

}
echo "<p>***dodatni zad za petlju u petlji.***</p>";

//koristeci for petlju ispisati sahovski tablu 8x8
for ( $i = 1; $i <= 8; $i++){
echo "<div style='padding:0; margin:0;'>";
    if ( $i % 2 !== 0){
        for ($j = 1 ; $j <= 8; $j++){
            if ( $j % 2 !== 0 ){
                echo "<div style='display:inline-block;border:2px solid black;background-color:black;width:100px;height:100px; color:black'></div>";
            }else{
                echo "<div style='display:inline-block;border:2px solid black;width:100px;height:100px; color:white'></div>";
            }
        }
    }else{
        for ($j = 1 ; $j <= 8; $j++){
            if ( $j % 2 == 0 ){
                echo "<div style='display:inline-block;border:2px solid black;background-color:black;width:100px;height:100px; color:black'></div>";
            }else{
                echo "<div style='display:inline-block;border:2px solid black;width:100px;height:100px;color:white'></div>";
            }
        }
    }
echo "</div>";
echo "<br>";

}


echo "<p>***zad 11.***</p>";
//Sabrati sve brojeve deljive sa 9 u intervalu od 1 do 30. *
$sum = 0;
for ( $i = 1 ; $i <= 30; $i++ ){
    if ( $i % 9 == 0 ){
        $sum += $i;
    }
}

echo "<p>Suma brojeva deljivih sa 9 od 1 do 30 je $sum .</p>";
echo "<p>***zad 11. drugi nacin***</p>";
$sum = 0;
$do = (30 % 9) * 9; 
for ( $i = 9 ; $i <= $do; $i+=9 ){
    if ( $i % 9 == 0 ){
        $sum += $i;
    }
}
echo "<p>Suma brojeva deljivih sa 9 od 1 do 30 je $sum .</p>";


echo "<p>***zad 12.***</p>";
//Odrediti proizvod svih brojeva deljivih sa 11 u intervalu od 20 do 100. *
$proizvod = 1;
for ( $i = 20 ; $i <= 100; $i++ ){
    if ( $i % 11 == 0 ){
        $proizvod *= $i;
    }
}
echo "<p>Proizvod svih brojeva deljivih sa 11 od 20 do 100 je $proizvod .</p>";

echo "<p>***zad 13.***</p>";
//Prebrojati koliko ima brojeva deljivih sa 13 u intervalu od 5 do 150. *

$brojac = 0;
for ( $i = 5 ; $i <= 150; $i++ ){
    if ( $i % 13 == 0 ){
        $brojac++;
    }
}
echo "<p>U intervalu od 5 - 50 tacbo je $brojac brojeva deljivih sa 13.</p>";

echo "<p>***zad 14.***</p>";
//Ispisati aritmetičku sredinu brojeva od $n do $m.
$n = 2;
$m = 5;
$sum = 0;
$brojac = 0;
for ( $i = $n; $i <= $m; $i++){
    $sum+= $i;
    $brojac++;

}
$a_sred = $sum / $brojac;

echo "<p>Arit sredina zbira brojeva od $n do $m je $a_sred</p>";

echo "<p>***zad 15.***</p>";
//Prebrojati koliko brojeva od $n do $m je pozitivno, a koliko njih je negativno. *
$br_poz= 0;
$br_neg= 0;
for ( $i = $n ; $i <= $m; $i++){
    if ( $i > 0 ){
        $br_poz++;
    }else{
        $br_neg++;
    }
}
echo "<p>Od $n do $m tacno je $br_poz pozitivnih i $br_neg negativnih brojeva</p>";

echo "<p>***zad 16.***</p>";
//Prebrojati koliko je brojeva od 5 do 50 koji su deljivi sa 3 ili sa 5. *
$brojac = 0;
for ( $i = 5 ; $i <= 50; $i++){
    if ( $i % 3 == 0 || $i % 5 == 0){
        $brojac++;
    }
}
echo "<p>U intervalu od 5 do 50 tacno je $brojac brojeva deljivih sa 3 ili sa 5.</p>";

echo "<p>***zad 17.***</p>";
//Prebrojati i izračunati sumu brojeva od n do m kojima je poslednja cifra 4 i parni su. *
$n = 5;
$m = 55;
$brojac = 0;
$suma = 0;
for ( $i = $n; $i <= $m; $i++ ){
    if ( $i % 10 == 4  && $i % 2 == 0 ){
        $brojac++;
        $suma+=$i;
    }
}

echo "<p>Od $n do $m tacno je $brojac brojeva koji su parni a poslednja cifra im je 4 anjihova suma he $suma.</p>";

echo "<p>***zad 18.***</p>";
// Ispisati brojeve od $n do $m, koji su deljivi sa $a.
$n = 5;
$m = 14;
$a = 7;
$brojac = 0;
for ( $i = $n; $i <= $m; $i++ ){
    if ( $i % $a == 0){
        echo "$i, ";
    }
}
echo "<p>***zad 18.drugi nacin***</p>";
$start = ceil( $n / $a ) *$a;
$end = floor( $m / $a ) *$a;

for ( $i =$start; $i <= $end; $i+=$a ){
    echo "$i, ";

}

echo "<p>***zad 19.***</p>";
// Ispisati brojeve od $n do $m koji nisu deljivi sa $a. *
$n = 5;
$m = 14;
$a = 7;
$brojac = 0;
for ( $i = $n; $i <= $m; $i++ ){
    if ( $i % $a !== 0){
        echo "$i, ";

    }
}



echo "<p>Pocetak je $start a kraj je $end</p>";

echo "<p>***zad 20.***</p>";
//Odrediti sumu brojeva od $n do $m koji  
//nisu deljivi brojem $a. *

$n = 5;
$m = 14;
$a = 7;
$suma = 0;
for ( $i = $n; $i <= $m; $i++ ){
    if ( $i % $a == 0){
        $suma+= $i;
    }
}
echo "<p>Suma brojeva od  $n do $m koji su deljivi sa $a je $suma.</p>";

echo "<p>***zad 21.***</p>";
// Odrediti proizvod brojeva od $n do $m koji su deljivi brojem $a, a nisu brojem $b. *
$n = 14;
$m = 32;
$a = 5;
$b = 10;
$proizvod = 1;
for ( $i = $n; $i <= $m; $i++ ){
    if ( $i % $a == 0 && $i % $b !== 0){//!($i % $b == 0)
        $proizvod*= $i;
    }
}
echo "<p>Proizvod brojeva od  $n do $m koji su deljivi sa $a a nisu sa $b je $proizvod.</p>";

echo "<p>***zad 21. drugi nacin***</p>";
$n = 14;
$m = 32;
$a = 5;
$b = 10;
$proizvod = 1;

$start = ceil($n / $a) *$a ;
$end = floor($m / $a) *$a ;
echo $end;
for ( $i = $start; $i <= $end; $i+=$a ){
    if ( $i % $b == 0){
        echo "<p>$i deljiv sa $b</p>";
        continue;
    }else{
        $proizvod*=$i;
    }
}
echo "<p>Proizvod brojeva od  $n do $m koji su deljivi sa $a a nisu sa $b je $proizvod.</p>";

?>
