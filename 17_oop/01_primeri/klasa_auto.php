<?php

class Auto{
    //polja
    var $marka;//equivalent to public. Polje ili atribut klase.
    var $boja;
    var $ima_krov;

    //metode
    function sviraj(){
        echo "<p>Beep! Beep!</p>";
    }

    function ispis (){
        echo "<p>Auto marke ".$this-> marka." . Boje: ".$this-> boja;
        if ( $this -> ima_krov ){
            echo " ima krov.</p>";
        }else{
            echo " nema krov.</p>";

        }
        //$this -> ima_krov taj objekat koji poziva ovu metodu njegovu ima_krov ispisi. Jedini nacin da unutar metode pristupumo ovim poljima.
    } 
}
//u svakoj metodi moguce je 
$a_1 = new Auto();
$a_1 -> marka = "Reno 4";
$a_1 -> boja = "Zelena";
$a_1 -> ima_krov = true;//da pogresimo jedno slovo on ne bi definisao ovaj ima krov nego bi taj atribut ostao NULL a dodao bi munovi atribut.
//$a_1 -> kubikaza = 1600;//on mu dodaje atribute

$a_2 = new Auto();
$a_2 -> marka = "Opel Corsa";
$a_2 -> boja = "Plava";
$a_2 -> ima_krov = true;

$a_3 = new Auto();
$a_3 -> marka = "Audi";
$a_3 -> boja = "Siva";
$a_3 -> ima_krov = false;


//sta stavimo u klasitocea vazi za sveobjkte a mi svakom objektu da dodajemo jos polja npr $sedste
// var_dump($a_1);
// var_dump($a_2);

echo "<p>Auto marke ".$a_3 -> marka." . Boje: ".$a_3 -> boja." ima krov:" .$a_3 -> ima_krov. "</p>";

$a_1 ->sviraj();
$a_1 ->ispis ();
$a_3 -> ispis();
?>