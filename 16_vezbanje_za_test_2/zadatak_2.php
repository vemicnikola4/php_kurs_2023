<?php

//zadatak 2
// ZADATAK. Dat je niz u kojem su smešteni odgovarajući letovi koji polaze sa nekog aerodroma u toku jednog dana. Svaki element tog niza odgovara jednom letu, pri čemu se za svaki let pamti destinacija (grad u koji avion sleće), država u kojoj se taj grad nalazi, kao i vreme poletanja aviona sa aerodroma (string u formatu “hh:mm”). U ovom zadatku, može se desiti da imamo više letova ka istoj destinaciji.
// 8 Kreirati niz $letovi, pri čemu je svaki element tog niza jedan asocijativni niz. Svaki od tih asocijativnih niza mora od ključeva da ima “dest” (destinaciju), “country” (zemlju te destinacije), kao i “time” (vreme sletanja).
// 9 Napisati funkciju brojLetovaZaZemlju($letovi, $zemlja) kojoj se prosleđuju niz letova, kao i zemlja, a funkcija vraća broj letova do date zemlje.
// 10 Napisati funkciju visePrePodne($letovi) kojoj se prosleđuje niz letova, a određuje da li je bilo više letova pre podne ili posle podne. Ukoliko je bilo više letova pre podne, vratiti true, a u suportnom, vratiti false.
// 11 Napisati funkciju ispisLetovaDoSada($letovi) kojoj se prosleđuje niz letova, kao i zemlja, a koja ispisuje sve letove koji su poleteli do trenutnog vremena.
// 12 Neke zemlje su označene kao crvene, jer je u njima nepovoljna epidemiološka situacija. Napisati funkciju rizicniLetovi($letovi, $crvenaZona) kojoj se prosleđuju niz letova, kao i niz zemlja, a koja ispisuje u paragrafima čiji je tekst obojen crvenom bojom, a u svakom paragrafu ispisati informacije o onim letovima koji kao destinaciju imaju zemlju iz crvene zone.
// 13 Neka destinacija je tražena ukoliko postoji više letova u toku dana za tu destinaciju. Napisati funkciju trazeneDestinacije($letovi) kojoj se prosleđuje niz letova, a koja ispisuje sve tražene destinacije (ukoliko postoje).
// 14 Napisati funkciju prosecanBrojLetovaZaZemlju($letovi) kojoj se prosleđuje niz letova, a koja vraća prosečan broj letova ka nekoj zemlji.

// Dat je niz u kojem su smešteni odgovarajući letovi koji polaze sa nekog aerodroma u toku jednog dana. Svaki element tog niza odgovara jednom letu, pri čemu se za svaki let pamti destinacija (grad u koji avion sleće), država u kojoj se taj grad nalazi, kao i vreme poletanja aviona sa aerodroma (string u formatu “hh:mm”). U ovom zadatku, može se desiti da imamo više letova ka istoj destinaciji.

$letovi_2 = [
    ["dest"=>"Barselona","country"=>"Spanija","time"=> "21:55"],
    ["dest"=>"Madrid","country"=>"Spanija","time"=> "21:30"],
    ["dest"=>"Solun","country"=>"Grcka","time"=> "11:50"],
    ["dest"=>"Valeta","country"=>"Malta","time"=> "15:00"],
    ["dest"=>"Glazgov","country"=>"Skotcka","time"=> "00:45"],
    ["dest"=>"Beograd","country"=>"Srbija","time"=> "16:20"],
    ["dest"=>"Beograd","country"=>"Srbija","time"=> "17:35"],
    ["dest"=>"Barselona","country"=>"Spanija","time"=> "11:00"],
    ["dest"=>"Madrid","country"=>"Spanija","time"=> "18:00"],
    ["dest"=>"Valensija","country"=>"Spanija","time"=> "09:15"]
];
// 9 Napisati funkciju brojLetovaZaZemlju($letovi, $zemlja) kojoj se prosleđuju niz letova, kao i zemlja, a funkcija vraća broj letova do date zemlje.
echo "<p>Ispis svih letova: </p>";
for ( $i = 0; $i < count ( $letovi_2 ); $i++ ){
    echo "<p>".$letovi_2[$i]['dest']." - ".$letovi_2[$i]['country']." - ". $letovi_2[$i]['time']."</p>";
}
function broj_letova_za_zemlju( $letovi, $zemlja ){
    $br=0;
    for ( $i = 0; $i < count ( $letovi ); $i++ ){
        if ( strtolower($letovi[$i]['country']) == strtolower($zemlja) ){
            $br++;
        }
    }
    return $br;
}
echo "<hr>";

echo broj_letova_za_zemlju( $letovi_2, "spanija" );
echo "<hr>";
// 10 Napisati funkciju visePrePodne($letovi) kojoj se prosleđuje niz letova, a određuje da li je bilo više letova pre podne ili posle podne. Ukoliko je bilo više letova pre podne, vratiti true, a u suportnom, vratiti false.

function vise_prepodne( $letovi ){
    $pre_p = 0;
    $posle_p = 0;
    for ( $i = 0; $i < count ( $letovi ); $i++ ){
        $vreme = (int) substr($letovi[$i]['time'],0,2);
        if (  $vreme < 12 ){
            $pre_p++;
        }else{
            $posle_p++;
        }
    }
    if ( $pre_p > $posle_p ){
        return true;
    }else{
        return false;
    }
}


if ( vise_prepodne( $letovi_2 )){
    echo "<p>Vise je bilo prepodnevnih letova</p>";
}else{
    echo "<p>Nije bilo vise prepodnevnih letova</p>";

}
// 11 Napisati funkciju ispisLetovaDoSada($letovi) kojoj se prosleđuje niz letova, kao i zemlja, a koja ispisuje sve letove koji su poleteli do trenutnog vremena.
function ispis_letova_do_sada( $letovi ){
    $tren_vreme = time();
    for( $i = 0; $i < count( $letovi ); $i++ ){
        $flight_time = $letovi[$i]['time'];
        $flight_time = str_replace( ":","",$flight_time);
        if ( strtotime($flight_time) <= $tren_vreme ){
            echo $letovi[$i]['dest']." ".$letovi[$i]['time']." , ";
        }
    }
}
echo "<p>Letovi koji su uzleteli.</p>";
ispis_letova_do_sada( $letovi_2 );
// 12 Neke zemlje su označene kao crvene, jer je u njima nepovoljna epidemiološka situacija. Napisati funkciju rizicniLetovi($letovi, $crvenaZona) kojoj se prosleđuju niz letova, kao i niz zemlja, a koja ispisuje u paragrafima čiji je tekst obojen crvenom bojom, a u svakom paragrafu ispisati informacije o onim letovima koji kao destinaciju imaju zemlju iz crvene zone.
$rizicne_zemlje = ["Spanija","Srbija","Malta"];
function rizicni_letovi ( $letovi , $crvena_zona ){
    for( $i = 0; $i < count( $letovi ); $i++ ){
        for ( $j = 0; $j < count ( $crvena_zona ); $j++){
            if ( strtolower($letovi[$i]["country"]) == strtolower($crvena_zona[$j])){
                echo "<p style='color:red'>Let sa rizicnim epidemioloskim statusom: ".$letovi[$i]['dest']." - ".$letovi[$i]['country'] ."- Vreme leta - " . $letovi[$i]['time']."</p>";
            }
        }
    }
}
echo "<hr>";
echo "<p>Letovi sa rizicnim epidemioloskim statusom:</p>";
rizicni_letovi ( $letovi_2 , $rizicne_zemlje );

// 13 Neka destinacija je tražena ukoliko postoji više letova u toku dana za tu destinaciju. Napisati funkciju trazeneDestinacije($letovi) kojoj se prosleđuje niz letova, a koja ispisuje sve tražene destinacije (ukoliko postoje).
function trazene_destinacije ( $letovi ){
    $trazeni_letovi =" ";
    for( $i = 0; $i < count( $letovi ); $i++ ){
        $br = 0;
        for ( $j = 0; $j < count ( $letovi ); $j++){
            if ( $letovi[$i]['dest'] == $letovi[$j]['dest']){
                $br++;
            }
        }
        if ( $br > 1 && !str_contains( $trazeni_letovi,$letovi[$i]['dest'] )){
            $trazeni_letovi .= $letovi[$i]['dest'] ." ";
        }
    }
    echo $trazeni_letovi;
}
echo "<hr>";

echo "<p>Trazene destinacije: </p>";
trazene_destinacije ( $letovi_2 );

// 14 Napisati funkciju prosecanBrojLetovaZaZemlju($letovi) kojoj se prosleđuje niz letova, a koja vraća prosečan broj letova ka nekoj zemlji.

function prosecan_broj_letova_za_zemlju( $letovi ){
    $broj_letova = 0;
    $sve_zemlje = [];
    for( $i = 0; $i < count( $letovi ); $i++ ){
        if ( !in_array($letovi[$i]['country'],$sve_zemlje) ){
            array_push( $sve_zemlje ,$letovi[$i]['country']);
        }
        $broj_letova++;
    }
    return $broj_letova/count($sve_zemlje);
}
echo "<hr>";
echo "<p>Prosecan broj letova ka zemljama je</p>";
echo prosecan_broj_letova_za_zemlju( $letovi_2 );


// echo time();
// $time = '12:45';
// // $time =str_replace( ":","",$time);
// echo "<hr>";

// echo strtotime( $time );
?>