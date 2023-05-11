<?php
function moja_funkcija(){
    echo "<p>Zdravo svima!</p>";
}

moja_funkcija();
function funkcija_dva( $text ){
    echo "<p>$text<p>";
}

funkcija_dva( "Ja se zovem Nikola. ");
$recenica = "Prezivam se Vemic.";
$c ="globalna";//ovu promenjivu mozemo da dohvatimo unutar funkcije sa global $c unutar funkcije;
// function funkcija_dva( $text ){
//     global $c;
//     echo "<p>$text $c<p>";
// }
funkcija_dva( $recenica );
function korisnik( $ime, $prezime ){
    echo "<p>Korisnik: $ime $prezime</p>";
}
korisnik( "Miki", "Peric");
function korisnica( $ime, $prezime = null ){//neobavezan parametar
    echo "<p>Korisnica: $ime $prezime</p>";
}
korisnica ( "Nevena","Bozovic" );
korisnica ( "Milena");

function clan( $ime, $prezime = null,$godine ){//neobavezan parametar
    echo "<p>Clan: $ime $prezime $godine</p>";
}

clan( "Mile", null , 35 );//moramo ovako da bi mogli da prosledimo treci parametar koji je obavezan;
clan( "Mile", 'Ilic' , 35 );

/**
 * @param int - prvi par broj
 * @param int - drugi par broj
 * 
 * @return int - zbir dva broja
 */
function zbir( $a, $b ){
    $zbir = $a + $b;
    return $zbir;//vrati mi $zbirtj vrednost $zbir;
}
echo zbir ( 3, 8 );//radice i ako mu damo string i int ( 3 , "10" );
echo "<br>";
echo zbir ( zbir( 3, 8 ), 10);//prvose izvrsavaju unutrasnji pozivi.
$a = zbir ( 4, 9 );
$b = zbir ( 5, 10 );
$c = zbir ( $a, $b );
echo "<p>$c</p>";
echo "<p>".zbir ( zbir( 4,9 ), zbir ( 5,10 ))."</p>";
// razlika izmedju include i require je ta sto include radi i ako lose navedemo putanju a require izbacuje gresku;
//include_once i require_once samo jednom.
//
function uvecaj( &$vrednost, $korak ){
    $vrednost = $vrednost + $korak;
    

}
$a = uvecaj ( 10 , 2 );
echo $a;
?>