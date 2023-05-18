<?php
// ZADATAK. Dat je niz u kojem su smešteni podaci o blogovima nekog korisnika. Svaki element tog niza odgovara jednom blogu, pri čemu se za svaki blog pamti naslov, broj lajkova, kao i broj dislajkova.
// 1. Kreirati niz $blogovi, pri čemu je svaki element tog niza jedan asocijativni niz. Svaki od tih asocijativnih niza mora od ključeva da ima “title” (naslov), “likes” (broj lajkova), kao i “dislikes” (broj dislajkova).
// 2. Napisati funkciju kojoj se prosleđuje $blogovi, a ona vraća ukupan broj lajkova.
// 3. Napisati funkciju kojoj se prosleđuje $blogovi, a ona vraća prosečan broj lajkova.
// 4. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji imaju više lajkova nego dislajkova.1
// 5. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji imaju najmanje duplo više lajkova nego dislajkova.
// 6. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji se završavaju uzvičnikom.
// 7. Napisati funkciju kojoj se prosleđuje $blogovi kao i $granica, a ona vraća broj blogova čiji je broj lajkova veći od granice.
// 8. Napisati funkciju kojoj se prosleđuje $blogovi kao i $rec, a ona vraća prosečan broj lajkova za one blogove koji u naslovu sadrže prosleđenu reč.
// 9. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje blogove koji imaju iznadprosečan broj lakova.
// 10. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje blogove koji imaju ispodprosečan broj dislakova.

// 1. Kreirati niz $blogovi, pri čemu je svaki element tog niza jedan asocijativni niz. Svaki od tih asocijativnih niza mora od ključeva da ima “title” (naslov), “likes” (broj lajkova), kao i “dislikes” (broj dislajkova).

$blogovi = [
    ["title"=>"Kuvanje","likes"=>25,"dislikes"=>29],
    ["title"=>"Pecanje","likes"=>12,"dislikes"=>35],
    ["title"=>"Pesacenje","likes"=>65,"dislikes"=>1],
    ["title"=>"Seoski turizam","likes"=>158,"dislikes"=>17],
    ["title"=>"Soping!","likes"=>40,"dislikes"=>65],
    ["title"=>"Istorija Panceva!","likes"=>57,"dislikes"=>8]
];
echo "<p>Svi blogovi ispis</p>";
for ( $i = 0; $i < count ( $blogovi ); $i++ ){
    echo "<p> Naslov: ".$blogovi[$i]['title']." Lajkovi ".$blogovi[$i]['likes']." Dislajkovi ".$blogovi[$i]['dislikes']. "</p>";
} 
echo "<hr>";
// 2. Napisati funkciju kojoj se prosleđuje $blogovi, a ona vraća ukupan broj lajkova.
function broj_lajkova($blog){
    $br = 0;
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        $br+=$blog[$i]['likes'];
    }
    return $br;
}

echo "<p>Ukupan broj lajkova u svim blogovima je ".broj_lajkova($blogovi)."</p>";

// 3. Napisati funkciju kojoj se prosleđuje $blogovi, a ona vraća prosečan broj lajkova.
function prosek_lajkova( $blog ){
    $ukupno_lajkova =  broj_lajkova($blog);
    return round($ukupno_lajkova/count( $blog ));
}

echo "<p>Prosek lajkova po blogu je ".prosek_lajkova( $blogovi )."</p>";

// 4. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji imaju više lajkova nego dislajkova.1
function vise_lajkova( $blog ){
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( $blog[$i]['likes'] > $blog[$i]['dislikes']){
            echo "<p> Naslov: ".$blog[$i]['title']."</p>";
        }
    }
}
echo "<p>Naslovi blogova koji imaju vise lajkova nego dislajkova: </p>";
vise_lajkova( $blogovi );
// 5. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji imaju najmanje duplo više lajkova nego dislajkova.

function duplo_vise_lajkova( $blog ){
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( $blog[$i]['likes'] >= (2 * $blog[$i]['dislikes'])){
            echo "<p> Naslov: ".$blog[$i]['title']."</p>";
        }
    }
}
echo "<p>Naslovi blogova koji imaju najmanje duplo vise lajkova nego dislajkova: </p>";

duplo_vise_lajkova( $blogovi );

// 6. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje sve one naslove blogova koji se završavaju uzvičnikom.


function zavrsava_sa_uz( $blog ){
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        $last_sign_pos = strlen($blog[$i]['title'])-1;
        if ( $blog[$i]['title'][$last_sign_pos] == "!" ){
            echo "<p> Naslov: ".$blog[$i]['title']."</p>";
        }
    }
}
echo "<p>Naslovi blogova kojizavrsavaju sa uzvicnikom: </p>";

zavrsava_sa_uz( $blogovi );

// 7. Napisati funkciju kojoj se prosleđuje $blogovi kao i $granica, a ona vraća broj blogova čiji je broj lajkova veći od granice.

function l_veci_od_granice( $blog , $granica ){
    $br = 0;
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( $blog[$i]['likes'] > $granica ){
            $br++;
        }
    }
    return $br;
}
$granica =25;
echo "<p>Broj blogova koji imaju vise od $granica lajkova je :".l_veci_od_granice( $blogovi , $granica )." </p>";

// 8. Napisati funkciju kojoj se prosleđuje $blogovi kao i $rec, a ona vraća prosečan broj lajkova za one blogove koji u naslovu sadrže prosleđenu reč.

function blogovi_sa_rec( $blog , $rec ){
    $br_lajkova = 0;
    $naslov_sa_rec = [];
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( str_contains ( $blog[$i]['title'],$rec)){
            $br_lajkova+= $blog[$i]['likes'];
            array_push( $naslov_sa_rec, $blog[$i]['title']);
        }
    }
    return round($br_lajkova/count( $naslov_sa_rec ));
}
$rec = "P";
echo "<p>Prosecan broj lajkova blogova koji sadrze $rec je :".blogovi_sa_rec( $blogovi , $rec )." </p>";

// 9. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje blogove koji imaju iznadprosečan broj lakova.

function natprosecan_br_lajkova( $blog ){
    $prosek_lajkova = prosek_lajkova( $blog );
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( $blog[$i]['likes'] > $prosek_lajkova){
            echo "<p> Naslov: ".$blog[$i]['title']." Lajkovi ".$blog[$i]['likes']." Dislajkovi ".$blog[$i]['dislikes']. "</p>";
        }
    }
}
echo "<p>Blogovi sa iznadprosecnim brojem lajkova su: </p>";
natprosecan_br_lajkova( $blogovi );
// 10. Napisati funkciju kojoj se prosleđuje $blogovi, a ona ispisuje blogove koji imaju ispodprosečan broj dislakova.

function natprosecan_br_dislajkova( $blog ){
    $ukupno_dislajkova = 0;
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        $ukupno_dislajkova += $blog[$i]['dislikes'];
    }
    $prosek_dislajkova = $ukupno_dislajkova / count( $blog );
    echo "<p>Prosek dislajkova po blogu je $prosek_dislajkova</p>";
    for ( $i = 0; $i < count ( $blog ); $i++ ){
        if ( $blog[$i]['dislikes'] > $prosek_dislajkova ){
            echo "<p> Naslov: ".$blog[$i]['title']." Lajkovi ".$blog[$i]['likes']." Dislajkovi ".$blog[$i]['dislikes']. "</p>";
        }
    }
}
echo "<p>Blogovi sa iznadprosecnim brojem dislajkova su: </p>";
natprosecan_br_dislajkova( $blogovi );
?>