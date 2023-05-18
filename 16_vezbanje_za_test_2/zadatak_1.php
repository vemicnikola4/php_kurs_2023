<?php

// ZADATAK. Sa niškog aerodroma u toku jednog dana polaze letovi ka različitim gradovima. Dat je asocijativni niz u kojem su ključevi destinacije letova, a vrednosti broj putnika na svakom letu.

// Kreirati niz $letovi po uslovima zadatka.
// 1 Napisati funkciju maxBrojPutnika($letovi) kojoj se prosleđuje niz letova, a funkcija vraća maksimalan broj putnika na nekom od letova.
// 2 Napisati funkciju brojMax($letovi) kojoj se prosleđuje niz letova, a funkcija vraća broj letova na kojima je leteo maksimalan broj putnika.
// 3 Napisati funkciju prosek($letovi) kojoj se prosleđuje niz letova, a funkcija vraća prosečan broj putnika po letu sa niškog aerodroma tog dana.
// 4 Dan je bio isplativ za niški aerodrom ukoliko je u većini letova broj putnika bio veći od zadate granice. Napisati funkciju isplativ($letovi, $granica) kojoj se prosleđuju niz letova, kao i granica, a funkcija ispituje da li je dan bio isplativ (vraća true ako jeste i false ako nije).
// 5 Dan je alarmantan za niški aerodrom ukoliko postoji neki let u kojem je broj putnika bio manji od zadate granice. Napisati funkciju alarmantan($letovi, $granica) kojoj se prosleđuju niz letova, kao i granica, a funkcija ispituje da li je dan bio alarmantan (vraća true ukoliko je postojao let u kojem je broj putnika bio manji od granice, i false ako nije).
// 6 Napisati funkciju dobreDestinacije($letovi) kojoj se prosleđuje niz letova, a funkcija ispisuje letove sa natprosečnim brojem putnika.

$letovi = ["Milano"=>35,"Valeta"=>20,"Barselona"=>40,"Solun"=>40,"Beograd"=>15,"Frankfurt"=>28,"Split"=>34,"Zagreb"=>30,"Sarajevo"=>17];

// 1 Napisati funkciju maxBrojPutnika($letovi) kojoj se prosleđuje niz letova, a funkcija vraća maksimalan broj putnika na nekom od letova.

function max_broj_putnika ( $letovi ){
    $max_putnika = 0;
    foreach( $letovi as $val ){
        if ( $val > $max_putnika ){
            $max_putnika = $val;
        }
    }
    return $max_putnika;
}
echo max_broj_putnika ( $letovi );
// 2 Napisati funkciju brojMax($letovi) kojoj se prosleđuje niz letova, a funkcija vraća broj letova na kojima je leteo maksimalan broj putnika.
function broj_max( $letovi ){
    $max_putnika = max_broj_putnika ( $letovi );
    $br = 0;
    foreach ( $letovi as $val ){
        if ( $val == $max_putnika ){
            $br++;
        }
    }
    return $br;
}
echo "<hr>";
echo broj_max( $letovi );
// 3 Napisati funkciju prosek($letovi) kojoj se prosleđuje niz letova, a funkcija vraća prosečan broj putnika po letu sa niškog aerodroma tog dana.
function prosek ( $letovi ){
    $br = 0;
    $zbir = 0;
    foreach ( $letovi as $val ){
        $zbir+=$val;
        $br++;
    }
    return $zbir/$br;
}
echo "<p>Prosek putnika po letu je ".number_format(prosek ( $letovi ),2,".",",")."</p>";
// 4 Dan je bio isplativ za niški aerodrom ukoliko je u većini letova broj putnika bio veći od zadate granice. Napisati funkciju isplativ($letovi, $granica) kojoj se prosleđuju niz letova, kao i granica, a funkcija ispituje da li je dan bio isplativ (vraća true ako jeste i false ako nije).

function isplativ( $letovi , $granica ){
    $br_letova = 0;
    $br_isplativih = 0;
    foreach ($letovi as $val ){
        if ( $val > $granica ){
            $br_isplativih++;
        }
        $br_letova++;
    }
    if ( $br_isplativih > ( $br_letova / 2 )){
        return true;
    }else{
        return false;
    }
}
if (isplativ( $letovi , 29 ) ){
    echo "<P>Dan je bio isplativ</p>";
}else{
    echo "<P>Dan nije bio isplativ</p>";

}
// 5 Dan je alarmantan za niški aerodrom ukoliko postoji neki let u kojem je broj putnika bio manji od zadate granice. Napisati funkciju alarmantan($letovi, $granica) kojoj se prosleđuju niz letova, kao i granica, a funkcija ispituje da li je dan bio alarmantan (vraća true ukoliko je postojao let u kojem je broj putnika bio manji od granice, i false ako nije).

function alarmantan( $letovi, $granica ){
    foreach ($letovi as $val ){
       if ( $val < $granica ){
        return true;
       }
    }
    return false;
}
if (alarmantan( $letovi , 20 ) ){
    echo "<P>Dan je bio alarmantan</p>";
}else{
    echo "<P>Dan nije bio alarmantan</p>";

}
// 6 Napisati funkciju dobreDestinacije($letovi) kojoj se prosleđuje niz letova, a funkcija ispisuje letove sa natprosečnim brojem putnika.
function dobre_destinacije( $letovi ){
    $prosek = prosek ( $letovi );
    $prosek_p = number_format(prosek ( $letovi ),2,".",",");
    foreach ( $letovi as $key => $val ){
        if ( $val > $prosek ){
            echo "<p>Dobra destinacija je $key broj putnika je veci od proseka $prosek_p</p>";
        }
    }
}
dobre_destinacije( $letovi );







?>