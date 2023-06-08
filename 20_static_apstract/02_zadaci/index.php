<?php
require_once ( "class_trougao.php" );
require_once ( "class_pravougaonik.php" );
require_once ( "class_kvadrat.php" );

$t1 = new Trougao ( 8,7,9);
// $t2 = new Trougao ( 7,10,11);
// $t3 = new Trougao ( 4,5,8);
// $t4 = new Trougao ( 7,7,9);

$p1 = new Pravougaonik ( 7,9 );
// $p2 = new Pravougaonik ( 6,4 );
// $p3 = new Pravougaonik ( 9,11 );
// $p4 = new Pravougaonik ( 5,7 );

$k1 = new Kvadrat ( 8 );
// $k2 = new Kvadrat ( 11 );
// $k3 = new Kvadrat ( 3 );
// $k4 = new Kvadrat ( 6 );

// Napraviti niz objekata ovih klasa i naći geometrijski oblik sa najmanjim obimom i geometrijski oblik sa najvećom površinom?
// Šta je zajedničko ovim klasama?

// $nizGmOblika = [
//     $t1,$t2,$t4,$p1,$p2,$p3,$p4,$k1,$k2,$k3,$k4
// ];

echo "<p> Obim trougla: ".$t1 -> obimTrougla()." Povrsina ".$t1 -> povrsinaTrougla(). "</p>";
echo "<p> Obim pravougaonika: ".$p1 -> obimPravougaonika()." Povrsina ".$p1 -> povrsinaPravougaonika(). "</p>";
echo "<p> Obim kvadrata: ".$k1 -> obimKvadrata()." Povrsina ".$k1 -> povrsinaKvadrata(). "</p>";


$oblici = [$t1 , $p1, $k1 ];

//problem : Svaka od ove tri klase ima svoju metodu za obim i povrsinu. Elementi niza su razlicite figure.
// foreach ( $oblici as $oblik ){
    //if ( $oblik objekat klase trougao ){
        //echo "<p> Obim trougla: ".$oblik -> obimTrougla()." Povrsina ".$oblik -> povrsinaTrougla(). "</p>";
    //}elseif( $oblik objekat klase pravougaonik ){
    //     echo "<p> Obim pravougaonika: ".$oblik -> obimPravougaonika()." Povrsina ".$oblik -> povrsinaPravougaonika(). "</p>";
    // }elseif( $oblik objekat klase kvadrat ){
    //     echo "<p> Obim pravougaonika: ".$oblik -> obimKvadrata()." Povrsina ".$oblik -> povrsinaKvadrata(). "</p>";
    //}else{
        //nepodrzan geo figura.
    // }
// }

foreach ( $oblici as $oblik){
    //mozemo li nekako da nateramo php da odredi koju varijantu obima ili povrsine da pozove. da li za trougao kv ili pravoug.. I ako preimenujemo metode u sve tri klase u obim i povrsina mi opet imamo 6 razlicitih nezavisnih metoda.
    //na ovaj nacin hocemo da ima jedna metoda sa tri razlicita nacina funkcionisanja.
    //Prvo cemo da napravim natklasu. Iz te klasecemo da izvedemo kv pravo i troug i onda jos nestotreba da uradimo
    "<p> Obim trougla: ".$oblik -> obim()." Povrsina ".$oblik -> povrsina(). "</p>";
}
?>