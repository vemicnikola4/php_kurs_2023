<?php
// Kreirati klasu Kvadrat koja od privatnih polja sadrži:
// a (vrednost stranice kvadrata)
// Obezbediti odgovarajuće getere, setere, kao i konstruktor
// Napisati metodu obimKvadrata koja računa obim kvadrata
// Napisati metodu povrsinaKvadrata koja računa povrišinu kvadrata

class Kvadrat {

    private $a;

    public function __construct ( $a ){
        $this -> setA( $a );
    }
    public function setA( $a ){
        if ( $a > 0 ){
            $this -> a = $a;
        }else{
            $this -> a = 0;
        }
    }
    public function getA(  ){
        return $this -> a ;
    } 
    public function obim( ){
        return $this -> a * 4;
    }
    public function povrsina( ){
        return $this -> a ** 2;
    }
    public function ispis(){
        echo "<p>Kvadrat sa stranicom a = ".$this -> a." cm . Ima obim ".$this -> obim()." a povrsine ".$this -> povrsina( )." </p>";
    }

}


?>
