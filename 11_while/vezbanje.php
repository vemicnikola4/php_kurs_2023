<?php
echo "<p>***zad 1.***</p>";
// zad 1. Ispisati brojeve od 1 do 20:
// Svaki u istom redu
// Svaki u novom redu

$i = 1;

while( $i <= 20){
    echo "<span>$i ,</span>";
    $i++;
}

$i = 1;

while( $i <= 20){
    echo "<p>$i</p>";
    $i++;//inkrement
}
echo "<p>***zad 2.***</p>";
// Ispisati brojeve od 20 do 1. 

$i = 20;
while( $i >= 1){//dok god je uslov tacan radi kod
    echo "<span>$i ,</span>";
    $i--;
}
echo "<p>***zad 4.***</p>";

// Kreirati n paragrafa sa proizvoljnim tekstom i naizmenično ih obojiti u tri različite boje

$i = 0;
$n = 5;
while ( $i <= $n){
    if ( $i % 3 == 0){
        echo "<p style='color:red'>Hello $i</p>";
        $i++;
    }elseif( $i % 3 == 1 ){
        echo "<p style='color:blue'>Hello $i</p>";
        $i++;
    }else{
        echo "<p style='color:orange'>Hello $i</p>";
        $i++;
    }
   
}
echo "<p>***zad 4. drugi nacin***</p>";

$i = 0;
$n = 5;
while ( $i <= $n){
    if ( $i % 3 == 0){
        $boja = 'purple';
    }elseif( $i % 3 == 1 ){
        $boja = 'lime';
    }else{
        $boja = 'magenta';   
    }
    echo "<p style='color:$boja'>Hello $i</p>";
    $i++;  
}


echo "<p>***zad 3.***</p>";
//Ispisati parne brojeve od 1 do 20. *

$i = 1;
while ( $i <= 20){
    if ( $i%2 == 0){
        echo $i . ",";
    }
    $i++;
}

echo "<p>***zad 5.***</p>";
//Kreirati n proizvoljnih slika i staviti im naizmenično dva različita okvira *
$n = 9;
$i = 0;
while ( $i <= $n){
    if ( $i % 2 == 0){
        echo "<img src='mongoose-7942222__340.jpg' alt='slika' style='border:2px dotted red'>";
    }else{
        echo "<img src='mongoose-7942222__340.jpg' alt='slika_2'style='border:2px solid blue'>";
    }
    $i++;
}
echo "<hr>";
echo "<p>***Dodatni zad.***</p>";
//ispisi n paragrafa svaki u random boji

$n = 9;
$i = 0;
while ( $i <= $n){
    $color_1 = mt_rand( 1, 255);
    $color_2 = mt_rand( 1, 255);
    $color_3 = mt_rand( 1, 255);
    echo "<p style='color:rgb($color_1,$color_2,$color_3);'> Hello</p>";
    $i++;
}
echo "<p>***zad 6.***</p>";
// Odrediti sumu brojeva od 1 do 100

$suma = 0;
$i = 0;
while ( $i <= 100 ){
    $suma += $i;
    $i++;
}

echo $suma;

echo "<p>***zad 7.***</p>";
//Odrediti sumu brojeva od 1 do n *
$suma = 0;
$i = 0;
$n = 50;
while ( $i <= $n ){
    $suma += $i;
    $i++;
}

echo $suma;
echo "<p>***zad 8.***</p>";

//Odrediti sumu brojeva od n do m *
$suma = 0;

$n = 5;
$m = 7;
while ( $n <= $m ){
    $suma += $n;
    $n++;
}

echo $suma;
echo "<p>***zad 9.***</p>";
// Odrediti proizvod brojeva od n do m
$proizvod = 1;

$n = 5;
$m = 7;
while ( $n <= $m ){
    $proizvod *= $n;
    $n++;
}

echo $proizvod;

echo "<p>***zad 10.***</p>";

// Odrediti sumu kvadrata parnih i sumu kubova neparnih brojeva od n do m 
$s_kv_parnih = 0;
$s_ku_neparnih = 0;
$n = 2;
$m = 5;

$broj_1 = $n;
$broj_2 = $m;

while ( $n <= $m){
    if ( $n % 2 == 0){
        $n_kv = $n**2;//na kvadrat
        $s_kv_parnih+= $n_kv;
    }else{
        $n_ku = $n**3;//na kub
        $s_ku_neparnih+= $n_ku;
    }
    $n++;
}
echo "<p>Suma kvadrata parnih od $broj_1 do $broj_2 je: $s_kv_parnih</p>";

echo "<p>Suma kubova neparnih od $broj_1 do $broj_2 je: $s_ku_neparnih</p>";

echo "<p>***zad 11.***</p>";
//Odrediti sa koliko brojeva je deljiv uneti broj k 
$brojac = 0;
$k = 15;
$i = 1;
while ( $i <= $k ){
    if ( $k % $i == 0){
        $brojac++;
    }
    $i++;
}
echo "<p>Broj $k je deljiv sa $brojac brojeva.</p>";
echo "<p>***zad 12.***</p>";
// Odrediti da li je dati prirodan broj n prost. Broj je prost ako je deljiv samo sa jedan i sa samim sobom. 
// Prost mora da bude veci od 1;
$brojac = 0;
$n = 12;

$i = 1;

while ( $i <= $n ){
    if ( $n % $i == 0 ){
        $brojac++;
    }
    $i++;
}
if ( $brojac <= 2 ){
    echo "<p>Broj $n je prost</p>";
}else{    
    echo "<p>Broj $n nije prost</p>";
}
echo "<p>***zad 12. drugi nacin***</p>";
$brojac = 0;
$k = 6;
$i = 2;

while ( $i < $k){
    if ( $k % $i == 0){
        $brojac++;
    }
    $i++;
}
if ( $brojac == 0 ){
    echo "<p>Broj $k je prost</p>";
}else{
    echo "<p>Broj $k nije prost</p>";
}
echo "<p>***zad 12. treci nacin***</p>";
$k = 7;
$i = 2;
$prost = true;

while ( $i < $k){//usteda memorije ako imamo milion brojeva. Manje vremena nam treba da stignemo do resenja.
    if ( $k % $i == 0){
        $prost = false;
        break;//prekini petlju.exit prekida sve procese u fileu. A break samo petlju
    }
    $i++;
}
if ( $prost ){//If ( $prost == true )
    echo "<p>Broj $k je prost</p>";
}else{
    echo "<p>Broj $k nije prost</p>";

}
echo "<p>***zad 12. cetvrti nacin***</p>";

$k = 7;
$i = 2;
$prost = true;

while ( $i <= sqrt($k)){//Po teoremi koja kaze ako do kv korena tog broja ne nadjemo delioc onda je broj prost.
    if ( $k % $i == 0){
        $prost = false;
        break;//prekini petlju.exit prekida sve procese u fileu. A break samo petlju
    }
    $i++;
}
if ( $prost ){//If ( $prost == true )
    echo "<p>Broj $k je prost</p>";
}else{
    echo "<p>Broj $k nije prost</p>";

}
echo "<p>***zad 13.***</p>";

// Množiti sve brojeve od 20 ka 1, sve dok proizvod ne predje 10.000. Prikazati konacan rezultat crvenom bojom a poslednje pomnozeni broj - zelenom.
$k = 20;
$n = 20;
$i = 1;
$proizvod = 1;

while ( $i <= $k){
    $proizvod *= $n;
    if ( $proizvod > 10000){
        echo "<p style='color:red'>$proizvod</p>";
        echo "<p style='color:green'>$n</p>";
        break;//dobar je jer optimizuje kod.
    }
    $n--;
    $i++;
}


echo "<p>***zad 14.***</p>";
// Uneti 2 broja. Ukoliko je prvi broj manji od drugog broja, množiti prvi broj samim sobom, sve dok rezultat ne bude veći od drugog unetog broja. U suprotnom na ekranu ispisati “GREŠKA”.

$b_1 = 16;
$b_2 = 8;
if ( $b_1 < $b_2 ){
    while( $b_1 <= $b_2 ){
        $b_1 *= $b_1;
    }
    echo "<p>$b_1</p>";
}else{
    echo "<p>GRESKA</p>";
}





?>