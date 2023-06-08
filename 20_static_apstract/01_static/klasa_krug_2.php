<?php

class Krug{

    protected $r;
    const PI = 3.14;
    //static polje ne mora ali moze da ima neku defolt vrednost.
    private static $pi = self::PI;
    private static $brojDecimala = 2;
    private static $brojKrugova=0;

    public function __construct ( $r ){
        self::$brojKrugova++;
        $this -> setR( $r );
    }

    public function setR( $r ){
        if ( $r > 0 ){
            $this -> r = $r;

        }else{
            $this -> r = 0;
        }
    }
    public function setPi( $pi) {
        self::$pi = $pi;
    }
    public function setBrojDecimala($brojDecimala){
        self::$brojDecimala = $brojDecimala;
    }
    public function getPi( ) {
        return self::$pi;
    }
    public function getR(  ){
        return $this -> r;
    }
    public function getBrojDecimala( ) {
        return self::$brojDecimala;
    }
    public static function getBrojKrugova( ) {
        return self::$brojKrugova;
    }
    // obim 2r p
    public function obimKruga ( ){
        
        // return ($this -> r *  2) *  Krug::PI;
        return round(( $this -> r * 2 ) * self::$pi, self::$brojDecimala);
        
    }
    // r na kv p 
    public function povrsinaKruga ( ){
        
        return ($this -> r * $this -> r) * self::PI;
    }

}
// od 6 - 9 slajd
//stranice ne negatovne vrednosti.
//bile koje dve stranice u zbiru vece ili jednake od ove trece.
//Kvadrat
// a vrednost str kvadrata.

?>