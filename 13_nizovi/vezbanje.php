<?php
// ini_set('default_charset', 'UTF-8'); - je podesavanje na koje mislim ali to ne resava var_dump. Sve u svemu u radu sa nizom trenutno nije mnogo bitna duzina stringa. Ali ako radite sa stringovima i zelite da uzmete duzinu stringa koji sadrzi nasa slova umesto strlen() koristiti f-ju mb_strlen() kao i ostale fje sa prefiksom mb kao sto je mb_substr, mb_strrpos, itd.
echo "<p>***Zad 1.***</p>";
// Ispisati sve elemente niza od 5 stringova.
echo "<p>***Zad 2.***</p>";
echo "<p>*Odrediti zbir elemenata celobrojnog niza.*</p>";
$brojevi= [5,14,-4,91,0,11,-7,9,91];//celi brojevimogu biti poz i negativni
$sum = 0;
for ( $i = 0; $i < count( $brojevi ); $i++){
    $sum += $brojevi[$i];
}
echo "<p>Sume brojeva niza je $sum.</p>";
$zbir = array_sum( $brojevi );
echo "<p>Sume brojeva niza je $zbir.</p>";
echo "<p>***Ako je niz prazan poredjenje***</p>";

$brojevi_2 = [];
if ( $brojevi_2 == []){
    echo "Niz je prazan!";
}else{
    echo "Niz nije prazan!";

}

if ( !$brojevi_2 ){
    echo "Niz je prazannnn!";
}else{
    echo "Niz nije prazan!";

}
echo "<p>***Zad 3.***</p>";
echo "<p>*Odrediti srednju vrednost elemenata celobrojnog niza.*</p>";
$sr_vr = $sum / count($brojevi);//da je zbir prazan on bi pokusao da deli sa 0;
// $sr_vr = array_sum( $brojevi )/count($brojevi);
echo "<p>Srednja vrednost brojeva je $sr_vr.</p>";

echo "<p>***Zad 4.***</p>";
echo "<p>Odrediti maksimalnu vrednost u celobrojnom nizu</p>";
$max = $brojevi[0];
$index = 0;

for ( $i = 0; $i < count( $brojevi ); $i++){
    if ( $brojevi[$i] > $max ){
        $max = $brojevi[$i];
        $index = $i;
    }
}
echo "<p>Najveci broje niza je $max .</p>";

echo "<p>***Zad 6.***</p>";
echo "<p>*Odrediti indeks najvećeg elementa celobrojnog niza.*</p>";
echo "<p>Prvi indeks najveceg broja je $index.</p>";
$posl_index = count($brojevi)-1;
$max = $brojevi[$posl_index];
$index = $posl_index;

for ( $i = $posl_index; $i >= 0; $i--){
    if ( $brojevi[$i] > $max ){
        $max = $brojevi[$i];
        echo $i;
    }
}
echo "<p>Najveci broje niza je $max .</p>";
echo "<p>Poslednji indeks najveceg broja je $index.</p>";

echo "<p>***Zad 5.***</p>";
echo "<p>drediti minimalnu vrednost u celobrojnom nizu. *</p>";
$brojevi= [5,14,-4,91,0,11,-7,9,91];
$min = $brojevi[0];
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    if ( $brojevi[$i] < $min ){
        $min = $brojevi[$i];
    }
}
echo "<p>Minimalna vrednost je  $min.</p>";

echo "<p>***Zad 7.***</p>";
echo "<p>*Odrediti broj elemenata celobrojnog niza koji su veći od srednje vrednosti.*</p>";
$brojevi= [1,2,15,14];
// $art_sredina = array_sum( $brojevi )/ count( $brojevi );
$sum = 0;
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    $sum += $brojevi[$i];
}
$art_sredina = $sum / count( $brojevi );
$count = 0;
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    if ( $brojevi[$i] > $art_sredina ){
        $count++;
    }
}
echo "<p>Broj vrednosti vecih od srednje vrednosti $art_sredina; ovog niza je $count.</p>";


echo "<p>***Zad 8.***</p>";
//Izračunati zbir pozitivnih elemenata celobrojnog niza. *
$brojevi= [5,14,-4];
$sum = 0;
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    if ( $brojevi[$i] >  0){
        // echo "$brojevi[$i],";
        $sum += $brojevi[$i];
    }
}
echo "<p>Zbir pozitivnih elemenata u ovom nizu je $sum.</p>";
echo "<p>***Bonus zadatak***</p>";
//izracunati srednju vrednost parnih elemenatacelobrojnog niza
$brojevi= [5,91,0,11,-7,9,91];
$zbir_parnih_el = 0;
$count_parnih_el = 0;
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    if ( $brojevi[$i] % 2 == 0 ){
        $zbir_parnih_el += $brojevi[$i];
        $count_parnih_el++;
    }
}
if ( $count_parnih_el != 0){
    $sr_vr = $zbir_parnih_el / $count_parnih_el;
}else{
    $sr_vr = 0;
}
echo "<p>$sr_vr</p>";


echo "<p>***Zad 9.***</p>";
//  Odrediti broj parnih elemenata u celobrojnom nizu. *
$brojevi= [5,14,-4,91,0,11,-7,9,91];
$count = 0;
for ( $i = 0; $i < count ( $brojevi ); $i++ ){
    if ( $brojevi[$i] % 2 == 0 ){
        $count++;
    }
}

echo "<p>Broj parnih elemenata je $count</p>";

echo "<p>***Zad 10.***</p>";
//  Izračunati sumu elemenata u nizu sa parnim indeksom. *
$brojevi= [5,2,-7,4];
$sum = 0;
for ( $i = 0; $i < count( $brojevi ); $i+=2 ){
    $sum += $brojevi[$i];
}

echo "<p>Zbir elemenata u nizu sa parnim indeksom je $sum</p>";
echo "<p>***Zad 11.***</p>";
// Promeniti znak svakom elementu celobrojnog niza. *
$brojevi= [5,2,-7,4];
for ( $i = 0; $i < count( $brojevi ); $i++ ){
    $new_value = -1 * $brojevi[$i];
    $brojevi[$i] = $new_value;
    echo "$brojevi[$i];";
}
echo "<p>***Zad 12.***</p>";
// Promeniti znak svakom neparnom elementu celobrojnog niza sa parnim indeksom. *
$brojevi= [5,14,-5,13];
print_r( $brojevi );
echo "<br>";
for ( $i = 0; $i < count( $brojevi ); $i+=2){
    if ( $brojevi[$i] % 2 !== 0 ){
        $brojevi[$i] *= -1;
    }
}
print_r($brojevi);
echo "<p>***Zad 13.***</p>";
// Odrediti broj parnih elemenata sa neparnim indeksom. *
$brojevi= [5,14,-4,90,0,11,-7,9,91];
$count = 0;
for ( $i = 1; $i < count( $brojevi ); $i+=2){
    if( $brojevi[$i] % 2 == 0 ){
        $count++;

    }
}
echo "<p>Broj parnih elemenata sa neparnim indeksom je $count</p>";

echo "<p>***Zad 14.***</p>";
// Ispisati dužinu svakog elementa u nizu stringova.
$niz = [ 'Nikola', 'Milica', 'Pavle', 'Milenko', 'Ćira' , 'Dušan' ];
for ( $i = 0; $i < count( $niz ); $i++ ){
    echo "<p> Duzina stringa $niz[$i] je " . mb_strlen( $niz[$i],"UTF-8" ). "</p> "; //mb_strlen( $niz[$i],"UTF-8" ) kada se koriste nasa slova neophodno je da koristimo strlen ovako.;
}
echo "<p>***Zad 15.***</p>";
// Odrediti element u nizu stringova sa najvećom dužinom.
$niz = [ 'Nikola', 'Milica', 'Pavle', 'Milenko', 'Ćira' , 'Dušan' ]; 
$najduzi = $niz[0];
for ( $i = 1; $i < count( $niz ); $i++ ){
    if ( mb_strlen( $niz[$i],"UTF-8" ) > mb_strlen( $najduzi, "UTF-8" ) ){
        $najduzi = $niz[$i];
    }
}
echo "<p>Najduzi element niza je  $najduzi</p>";


echo "<p>***Zad 16.***</p>";
// Odrediti broj elemenata u nizu stringova čija je dužina veća od prosečne dužine svih stringova u nizu.
$niz = [ 'Nikola', 'Milica', 'Pavle', 'Milenko', 'Ćira' , 'Dušan' ]; 
$duzina_svih_imena = 0;
for ( $i = 0; $i < count( $niz ); $i++ ){
    $duzina_svih_imena += mb_strlen($niz[$i], "UTF-8" );
    
}
$prosecna_duzina = $duzina_svih_imena / count( $niz );
$count = 0;
for ( $i = 0; $i < count( $niz ); $i++ ){
    if( mb_strlen($niz[$i], "UTF-8" ) > $prosecna_duzina ){
        $count++;
    }
    
}
echo "<p>Broj elemenata cije duzina je duza od prosecne duzine elemenata $prosecna_duzina ; je $count</p>";

echo "<p>***Zad 17.***</p>";
// Odrediti broj elemenata u nizu stringova koji sadrže slovo 'a'. *
$niz = [ 'Nikola', 'Milica', 'Pavle', 'Milenko', 'Ćira' , 'Dušan','Andrija' ]; 
$count = 0;
for ( $i = 0; $i < count( $niz ); $i++ ){
    if  ( strpos ( $niz[$i],"a") !== false){
        $count++;//kod strpos neophodno da poredimo sa !== false i po vrednosti i po tipu jer strpos($niz[$i],"N") vraca 0 a nula je jednaka false sa false po vrednosti ali ne i po tipu.
    }
}
echo "<p> Broj elemenata u nizu koji sadrze slovo a je $count </p>";

echo "<p>***Zad 18.***</p>";
// Odrediti broj elemenata u nizu stringova koji počinju na slovo 'a' ili 'A'. *
$count = 0;
for ( $i = 0; $i < count( $niz ); $i++ ){
    if  ( strtolower( $niz[$i][0]) == "a"){
        $count++;

    }
}
echo "<p> Broj imena koji pocinju sa a je $count</p>";

echo "<p>***Zad 19.***</p>";
// Na osnovu celobrojnog niza $a[0], $a[1], … formirati niz $b[0], $b[1], ... koji sadrži samo pozitivne brojeve.
$a= [5,14,-4,91,0,11,-7,9,91];
$b = [];
for ( $i = 0; $i < count( $a ); $i++ ){
    if ( $a[$i] > 0 ){
        array_push ( $b , $a[$i] );
    }
}
print_r( $b );
// array_pop( $b );
// echo "<br>";
// print_r( $b );
// array_shift( $b );
// echo "<br>";
// print_r( $b );
?>
