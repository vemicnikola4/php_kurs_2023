<?php
require_once ( "class_trougao.php" );
require_once ( "class_pravougaonik.php" );
require_once ( "class_kvadrat.php" );

$t1 = new Trougao ( 8,7,9);
$t2 = new Trougao ( 7,10,11);
$t3 = new Trougao ( 4,5,8);
$t4 = new Trougao ( 70,70,91);

$p1 = new Pravougaonik ( 7,9 );
$p2 = new Pravougaonik ( 6,4 );
$p3 = new Pravougaonik ( 9,11 );
$p4 = new Pravougaonik ( 5,7 );

$k1 = new Kvadrat ( 8 );
$k2 = new Kvadrat ( 11 );
$k3 = new Kvadrat ( 3 );
$k4 = new Kvadrat ( 6 );

// Napraviti niz objekata ovih klasa i naći geometrijski oblik sa najmanjim obimom i geometrijski oblik sa najvećom površinom?
// Šta je zajedničko ovim klasama?

$nizGmOblika = [
    $t1,$t2,$t4,$p1,$p2,$p3,$p4,$k1,$k2,$k3,$k4
];

function najmanjiObim ( $niz ){
    $najmanjiObim = $niz[0] -> obim();
    $najmanjiObimTelo = $niz[0];
    for ( $i = 1; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] -> obim() < $najmanjiObim ){
            $najmanjiObim = $niz[$i] -> obim();
            $najmanjiObimTelo = $niz[$i];
        }
    }
    return $najmanjiObimTelo;
}
$najmanjiObim = najmanjiObim ( $nizGmOblika );
$najmanjiObim -> ispis();
function najvecaPovrsina ( $niz ){
    $najvecaPov =  $niz[0] -> povrsina();
    $najvecaPovTelo = $niz[0];
    for ( $i = 1; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] -> povrsina() > $najvecaPov){
            $najvecaPov = $niz[$i] -> povrsina();
            $najvecaPovTelo = $niz[$i];
        }
    }
    return $najvecaPovTelo;
}
$najvecaPovrsina = najvecaPovrsina ( $nizGmOblika );
$najvecaPovrsina -> ispis();
?>