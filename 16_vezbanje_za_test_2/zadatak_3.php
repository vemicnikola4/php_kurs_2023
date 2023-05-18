<?php
// ZADATAK.3 Formirati asocijativni niz koji od ključeva i vrednosti sadrži:
// Datum (string u formatu YYYY/MM/DD),
// Kiša (true/false),
// Sunce (true/false),
// Oblačno (true/false),
// Vrednosti temperature (Niz temperatura tog dana).

// 1 Napisati funkciju koja određuje i vraća prosečnu temperaturu izmerenu tog dana.
// 2 Napisati funkciju koja prebrojava i vraća koliko merenja je bilo sa natprosečnom temperaturom.
// 3 Napisati funkciju koja prebrojava i vraća koliko merenja je bilo sa maksimalnom temperaturom.
// 4 Napisati funkciju koja prima dva parametra koji predstavljaju dve temperature. Potrebno je da metoda vrati broj merenja u toku dana čija je vrednost između ove dve zadate temperature (ne uključujući te dve vrednosti).
// 5 Napisati funkciju koja vraća true ukoliko je u većini dana temperatura bila iznad proseka. U suprotnom vraća false. 
// 6 Napisati funkciju koja za dan se smatra da je leden ukoliko nijedna temperatura izmerena tog dana nije iznosila iznad 0 stepeni. Metod vraća true ukoliko je dan bio leden, u suprotnom metod vraća false.
// 7 Za dan se smatra da je tropski ukoliko nijedna temperatura izmerena tog dana nije iznosila ispod 24 stepena. Napisati funkciju tropski($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio tropski, u suprotnom vraća false.
// 8 Dan je nepovoljan ako je razlika između neka dva uzastopna merenja veća od 8 stepeni. Napisati funkciju nepovoljan($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio nepovoljan, u suprotnom vraća false.
// 9 Za dan se kaže da je neuobičajen ako je bilo kiše i ispod -5 stepeni, ili bilo oblačno i iznad 25 stepeni, ili je bilo i kišovito i oblačno i sunčano. Napisati funkciju neuobicajen($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio neuobičajen, u suprotnom vraća false.

$dan = [
    "datum" => "2023/05/16",
    "kisa" => true,
    "sunce" => true,
    "oblacno" => true,
    "temperature" => [5,17,18,22,23,24]
];
for ( $i = 0; $i < count( $dan['temperature']); $i++ ){
    echo $dan['temperature'][$i] . ", ";
}
// 1 .Napisati funkciju koja određuje i vraća prosečnu temperaturu izmerenu tog dana.

function prosecna_temp ($dan){
    $temperature = $dan['temperature'];
    $sum = 0;
    for ( $i = 0; $i < count( $temperature ); $i++ ){
        $sum+=$temperature[$i];
    }
    return $sum/count( $temperature );
}
echo "<hr>";
echo "<p> Prosecna temperatura dana bila je ". prosecna_temp ( $dan ) ." C</p>";

// 2 Napisati funkciju koja prebrojava i vraća koliko merenja je bilo sa natprosečnom temperaturom.

function broj_natprosecnih_temp( $dan ){
    $br = 0;
    $prosecna_temp = prosecna_temp ($dan);
    $temperature = $dan['temperature'];
    for ( $i = 0; $i < count( $temperature ); $i++ ){
        if ( $temperature[$i] > $prosecna_temp ){
            $br++;
        }
    }
    return $br;
}
    
echo "<p>Broj netprosecnih temperatura je ".broj_natprosecnih_temp( $dan )."</p>";
// 3 Napisati funkciju koja prebrojava i vraća koliko merenja je bilo sa maksimalnom temperaturom.

function broj_max_merenja($dan){
    $temperature = $dan['temperature'];
    $max = -200;
    $br = 0;
    for ( $i = 0; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] > $max ){
            $max = $temperature[$i];
        }
    }
    for ( $i = 0; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] == $max ){
            $br++;
        }
    }
    return $br;
}

echo "<p>Bilo je ".broj_max_merenja($dan)." merenje/a koje/a je/su odgovaralo/a maksimalnoj temperaturi dana.</p>";

// 5 Napisati funkciju koja vraća true ukoliko je u većini dana temperatura bila iznad proseka. U suprotnom vraća false.

function veci_deo_dana_iznad_p($dan){
    $temperature = $dan['temperature'];
    $prosecna_temp = prosecna_temp ($dan);
    $br = 0;
    for ( $i = 0; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] > $prosecna_temp ){
            $br++;
        }
    }
    if ( $br > (count( $temperature )/2)){
        return true;
    }else{
        return false;
    }
}
echo "<hr>";
if (veci_deo_dana_iznad_p($dan) ){
    echo "<p>Veci deo dana je bio iznad proseka</p>";
}else{
    echo "<p>Veci deo dana je bio ispod ili jednak prosecnoj temperaturi dana.</p>";
    
}

// 6 Napisati funkciju koja za dan se smatra da je leden ukoliko nijedna temperatura izmerena tog dana nije iznosila iznad 0 stepeni. Metod vraća true ukoliko je dan bio leden, u suprotnom metod vraća false.

function ledeni_dan( $dan ){
    $temperature = $dan['temperature'];
    for ( $i = 0; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] > 0){
            return false;
        }
    }
    return true;
}
if ( ledeni_dan( $dan )){
    echo "<p>Dan je bio leden</p>";
}else{
    echo "<p>Dan nije bio leden</p>";
}

// 7 Za dan se smatra da je tropski ukoliko nijedna temperatura izmerena tog dana nije iznosila ispod 24 stepena. Napisati funkciju tropski($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio tropski, u suprotnom vraća false.

function tropski($dan){
    $temperature = $dan['temperature'];
    for ( $i = 0; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] < 24 ){
            return false;
        }
    }
    return true;
}
if ( tropski ( $dan ) ){
    echo "<p>Dan je bio tropski.</p>";
}else{
    echo "<p>Dan nije bio tropski.</p>";

}

// 8 Dan je nepovoljan ako je razlika između neka dva uzastopna merenja veća od 8 stepeni. Napisati funkciju nepovoljan($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio nepovoljan, u suprotnom vraća false.

function nepovoljan ( $dan ){
    $temperature = $dan['temperature'];
    for ( $i = 1; $i < count ( $temperature ); $i++){
        if ( $temperature[$i] - $temperature[$i - 1] >= 8 ||  $temperature[$i - 1] - $temperature[$i] >= 8){
            return true;
        }
    }
    return false;
}
if ( nepovoljan ( $dan ) ){
    echo "<p>Dan je bio nepovoljan.</p>";
}else{
    echo "<p>Dan je bio povoljan.</p>";

}
// 10. Za dan se kaže da je neuobičajen ako je bilo kiše i ispod -5 stepeni, ili bilo oblačno i iznad 25 stepeni, ili je bilo i kišovito i oblačno i sunčano. Napisati funkciju neuobicajen($dan) kojoj se prosleđuje dan, a koja vraća true ukoliko je dan bio neuobičajen, u suprotnom vraća false.

function neuobicajan( $dan ){
    $neuobicajan = false;
    $ispod_5 = false;
    $iznad_25 = false;
    for ( $i =0; $i < count($dan['temperature']);$i++){
        if ( $dan['temperature'][$i] < -5 ){
            $ispod_5 = true;
            break;
        }
    }
    if ( $dan['kisa'] == true  && $ispod_5 == true ){
        $neuobicajan = true;
        return $neuobicajan;
    }
    for ( $i =0; $i < count($dan['temperature']);$i++){
        if ( $dan['temperature'][$i] > 25 ){
            $iznad_25 = true;
            break;
        }
    }
    if ( $dan['oblacno'] == true && $iznad_25 ==true ){
        $neuobicajan = true;
        return $neuobicajan;
    }
    if ( $dan['oblacno'] == true && $dan['kisa'] == true && $dan['sunce'] == true){
        $neuobicajan = true;
        return $neuobicajan;
    }
    return $neuobicajan;
}

if(neuobicajan( $dan )){
    echo "<p>Neuobicajan je dan</p>";
}else{
    echo "<p>Dan je bio neuobicajan</p>";

}
?>