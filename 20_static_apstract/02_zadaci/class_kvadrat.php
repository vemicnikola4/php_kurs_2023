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
    public function obimKvadrata( ){
        return $this -> a * 4;
    }
    public function povrsinaKvadrata( ){
        return $this -> a ** 2;
    }

}


?>
