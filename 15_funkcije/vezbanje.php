<?php
// Funkcija koja za uneti ceo broj vraca tacno ako je neparan ili netacno ukoliko nije neparan
function neparan ( $broj ){
    echo "<p>Pocetak</p>";
    if ( $broj % 2 == 0 ){
        return false;//prekida izvrsenje funkcije kada naidje na return,Ako bi stavili neki echo ispod else ne bi doslo do njega.
    }else{
        return true;
    }
    echo "<p>Kraj</p>";//ne vidi se jer return prekida izvrsenje funkcije.
}
//kako bi transormisali ovu funkciju da isto vraca true i false a prikazuje p k kraj
function neparan_2 ( $broj ){
    $rez = true;
    if ( $broj % 2 == 0 ){
        $rez = false;
    }
    return $rez;

}
$a = 15;
if ( neparan ($a) ){
    echo "<p>Broj je neparan</p>";
}else{
    echo "<p>Broj je paran</p>";
}
if ( neparan_2 ($a) ){
    echo "<p>Broj je neparan</p>";
}else{
    echo "<p>Broj je paran</p>";
}
echo "<p>***zad 2.***</p>";
// Napisati funkciju maks2 koja vraća veći od dva prosleđena realna broja. Zatim napisati funkciju maks4 koja vraća najveći od četiri realna broja.
// Pozvati funkcije i testirati njihov rad.

function maks_2 ( $a , $b){
    if ( $a > $b ){
        return $a;
    }else{
        return $b;
    }
}
$a = 35;
$b = 25;
echo "<p> Maksimalan od $a i $b je". maks_2( $a,$b)." <p>";

function maks_4 ( $a , $b , $c ,$d ){
    // $maks_a_b = maks_2( $a , $b );
    // $maks_c_d = maks_2( $c , $d );
    // $maks_4 = maks_2($maks_a_b, $maks_c_d );
    // return $maks_4;
    return maks_2(maks_2( $a , $b ), maks_2 ( $c, $d ));//prvo se vrsi prvi unutrasnji pa drugi unutrasnji pa spoljasnji.
    //Unutar jedne funkcije mozemo da zovemo druge.
}
$a = 35;
$b = 25;
$c = 50;
$d = 75;
echo "<p> Maksimalan od $a , $b , $c i $d je ". maks_4( $a , $b , $c ,$d )."</p>";

echo "<p>***zad 2.***</p>";
// Napisati funkciju slika kojoj se prosleđuje url adresa slike, a funkcija prikazuje sliku za prosleđenu adresu slike.
// Pozvati funkciju i testirati je za različite url adrese.

function slika ( $url ){
    echo "<img src='$url' alt='slika$url'>";
}

slika ( "countryside-7960674__340.jpg" );
slika ( "https://cdn.pixabay.com/photo/2023/04/21/12/18/flower-7941814_960_720.jpg" );
slika ( "https://cdn.pixabay.com/photo/2020/09/06/06/38/river-5548121__340.jpg" );

//broj mozemo proslediti po referenci ako zelimo da promenimo neku globalnu varijablu 

function uvecaj ( &$a , $korak = 10 ){//kada se putem ovog & poziva neka promenjiva koja sama sebi menja vrednost, za to se takodje koristi i global. Ne mora return;Kada zelimo da menjamo parametar koji smo prosledili.
    $a= $a + $korak;
}
$broj = 15;
uvecaj ( $broj );
echo "<p>$broj</p>";
//kada prosledjujemo po referenci sa ( &$parametar ) mi izmenjujemo taj globalni parametar koji smo uneli.Ne treba nam return.

//kako da definisemo fkc sa 3-4 defoltne vrednosti

function proba ( $a=1, $b=2,$c=10){//$a=null ako nije prosledjen onda je vrednost null
    // if ( is_null( $a )){
    //     $a = 1;
    // }
    return $a +$b +$c;
}

echo proba( null,null );//preskace prvu vrednost daje joj vrednost nula a za drugu i trecu uzima defoltnu vrednost 

echo "<p>***zad 4.***</p>";

// Napraviti funkciju obojenaRec kojoj se prosleđuje boja na engleskom jeziku i prosleđuje se proizvoljna reč. Prosleđenu reč ispisati u paragarfu bojom koja je prosleđena. Pozvati funkciju i testirati je.

function obojena_rec( $color , $word ){
    echo "<p style='color:$color'>$word</p>";
}
obojena_rec( 'blue' , 'Ovo je recenica plave boje');
obojena_rec( 'red' , 'Ovo je recenica crvene boje');

echo "<p>***zad 5.***</p>";

// Napraviti funkciju recenica1 koja pet puta ispisuje istu rečenicu u paragrafu, a veličina fonta rečenice treba da bude jednaka vrednosti iteratora (sami odredite startnu vrednost iteratora i za koliki korak ćete iterator povećavati). Testirati funkciju

function recenica_1 ( $recenica ){
    for ( $i = 10; $i < (10 + 5 *5); $i+=5 ){
        echo "<p style='font-size:".$i."px'>$recenica $i</p>";
    }
}
recenica_1 ( "Recenica koja menja font. Font = ");

echo "<p>***zad 6.***</p>";
// Napraviti funkciju recenica2 kojoj se prosleđuje veličina fonta a ona u paragrafu ispisuje proizvoljnu rečenicu. Pozvati funkciju pet puta za različite prosleđene vrednosti. Testirati funkciju.

function recenica_2 ( $font ){
    echo "<p style = 'font-size:".$font."px'>Ovo je neka recenica Font : $font </p>";
}
for ( $i = 10; $i < (10 + 5 *5); $i+=5 ){
    recenica_2 ( $i );
}
echo "<p>***zad 7.***</p>";

// Napraviti funkciju aritmeticka koja vraća aritmetičku sredinu brojeva od n do m. 
// Brojeve n i m proslediti kao parametre funkciji. Testirati funkciju.
function aritmeticka ( $n,$m ){
    $zbir = 0;
    $br = 0;
    for ( $i = $n; $i <= $m; $i++){
        $zbir += $i;
        $br++;
    }
    if ( $zbir == 0 ){
        return "<p>ERROR WRONG PARAMETARS</p>";
    }
    $ar_sr = $zbir / $br;
    return $ar_sr; 
}
$n = 5;
$m = 8;
echo "<p> Aritmeticka sredina zbira brojeva od $n do $m je ". aritmeticka ( $n,$m )."</p>";

echo "<p>***zad 8.***</p>";

// Napisati funkciju aritmetickaCifre koja vraća aritmetičku sredinu brojeva kojima je poslednja cifra 3 u intervalu od n do m.
// Brojeve n i m proslediti kao parametre funkciji. Testirati funkciju.

function aritmeticke_cifre ( $n , $m ){
    $zbir = 0;
    $br = 0;
    for ( $i = $n; $i <= $m; $i++ ){
        if ( $i % 10 == 3){
            $zbir += $i;
            $br++;
        } 
    }
    if ( !$br ){
        return "U ovom intervalu ne postoje brojevi cija je poslednja cifra 3.";
    }
    $ar_sr = $zbir / $br;
    return $ar_sr; 
}
$n = 5;
$m = 8;
echo "<p> Aritmeticka sredina od $n do $m cija je poslednja cifra 3 je: ". aritmeticke_cifre( $n,$m )."</p>";

echo "<p>***zad 9.***</p>";

// Dobili ste plaćenu programersku praksu u trajanju od n meseci. Prvog meseca, plata će biti a dinara. Ako budete vredno radili, svakog narednog meseca ćete dobiti povišicu od d dinara. Brojeve n, a i d određujete sami.
// Napišite funkciju praksa kojoj se prosleđuju brojevi n a i d. Funkcija treba da vrati vrednost koliko ćete ukupno navca zaraditi, ukoliko svakog meseca budete dobijali povišicu.
// Testirati zadatak (pozvati funkciju i ispisati vrednost koju ona vraća).

function praksa ($n, $a, $d ){
    $ukupno = $a + ( $n - 1 )*( $a + $d );
    // $ukupno = $a;
    // for ( $i = 1 ; $i < $n; $i++ ){
    //     //$ukupno += $a + $d;//
    // }
    return $ukupno;
}
echo praksa ( 5 , 35000 , 5000 );
function praksa_2 ($n, $a, $d ){
    $ukupno = 0;
    for ( $i = 0 ; $i < $n; $i++ ){
        $ukupno += $a + $d;
    }
    return $ukupno - $d;//oduzmi od ukupno bonus koji nismo dobili prvog meseca.
    //$ukupno = $n *( $a + $d ) - $d;
}
echo praksa_2 ( 5 , 35000 , 5000 );

echo "<p>***zad 10.***</p>";
// * Napraviti niz celih brojeva. 
// Ispisati sve neparne brojeve ovog niza koristeći funkciju neparan iz 1. zadatka.
// Pozvati funkciju i testirati je.

$niz = [ 2, 55, 21, 7, 4, 6];
for ( $i = 0 ; $i < count ( $niz ); $i++ ){
    if (neparan_2 ( $niz[$i] )){
        echo $niz[$i]. ",";
    }
}

echo "<p>***zad 11.***</p>";
// * Napraviti funkciju brojNeparnih kojoj se kao parametar prosleđuje niz celih brojeva, a funkcija prebrojava i vraća koliko neparnih brojeva ima prosleđeni niz.
// Pozvati funkciju i testirati je.

function broj_neparnih ( $niz ){
    $br = 0;
    // $str = "";
    for ( $i = 0 ; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] % 2 !== 0 ){
            $br++;
            // $str.=$niz[$i] . " ";
        }
    }
    return $br;
    // return $str;
}
echo broj_neparnih( $niz );

echo "<p>***zad 12.***</p>";

// U jednom gradu je od ponedeljka do petka, tačno u podne, merena temperatura vazduha. 
//Izmerene temperature su zapisane u obliku asocijativnog niza datum/temperatura. 
//Osmisliti funkciju (ili više njih) koja će na ekranu plavom bojom ispisati dan, datum i temperaturu kada je temperatura bila najniža, a crvenom bojom ispisati dan, datum i temperaturu kada je temperatura bila najviša. 
// Testirati implementirani kod.

$temperature = [ '01.05.2023' => 19 ,'02.05.2023' => 22 ,'03.05.2023' => 18 ,'04.05.2023' => 15 ,'05.05.2023' => 25 ,];

function najniza_temp( $arr ){
    $min = 100;
    $min_datum = "";
    $min_dan = 0;
    $dan = 1;
    foreach ( $arr as $key => $val ){
        if ( $min > $val ){
            $min = $val;
            $min_datum = $key;
            $min_dan = $dan;
        }
        $dan++;
    }
    $dani = ['Pon','Uto','Sre','Cet','Pet'];
    echo "<p style='color:blue'> ".$dani[$min_dan - 1]." ". $min_datum." ". $min ."</p>";
}

najniza_temp( $temperature );

function najniza_temp_2( $temp , $dani ){
    $min_temp = 100;
    $min_datum = "";
    $dan = "";
    $br = 0;
    foreach ( $temp as $datum => $temp ){
        if ( $temp < $min_temp ){
            $min_temp = $temp;
            $min_datum = $datum;
            $dan = $dani[$br];
        }
        $br++;
    }
    echo "<p style='color:blue'>$dan $min_datum  $min_temp </p>";
}
$dani = ['Pon','Uto','Sre','Cet','Pet'];
najniza_temp_2( $temperature , $dani );
//projekat:
//U folderu domaci zadaci
?>