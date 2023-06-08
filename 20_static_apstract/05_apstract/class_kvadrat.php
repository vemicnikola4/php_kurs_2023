<?php
require_once "class_oblik.php";
// Kreirati klasu Kvadrat koja od privatnih polja sadrži:
// a (vrednost stranice kvadrata)
// Obezbediti odgovarajuće getere, setere, kao i konstruktor
// Napisati metodu obimKvadrata koja računa obim kvadrata
// Napisati metodu povrsinaKvadrata koja računa povrišinu kvadrata

class Kvadrat extends Oblik{

    private $a;

    public function __construct ( $a ){
        parent::__construct( Oblik::KVADRAT );
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
    //ovako povezujemo metodu obim iz nad klase i tak0 opostizemo da jedna metoda ima svoje verzije u razlicitim podklasama.Tako sto cemo da je nazovemo isto.
    //kada metodu nazovemo isto kao i u nadklasi dolazi do overide. To je i dalje jedna metoda iz nad klase ali su joj ugradjene neke dodatne funkcije u ovoj podklasi.
    //funckija se zove isto i iste parametre da prima.
    //***OVERRIDE */
    //ako su im potpisi isti 
    public function obim( ){
        return $this -> a * 4;
    }
    public function povrsina( ){
        return $this -> a ** 2;
    }
    //preklapanje overload
    //nece nam prijavljivati gresku.
    // public function obim( $a ){
    //     return $this -> a * 4;
    // }

    
}


?>
