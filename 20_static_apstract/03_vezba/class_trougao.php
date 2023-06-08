<?php

// Kreirati klasu Trougao koja od privatnih polja sadrži:
// a, b, c (vrednosti stranice trougla)
// Obezbediti odgovarajuće getere, setere, kao i konstruktor
// Napisati metodu obimTrougla koja računa obim trougla
// Napisati metodu povrsinaTrougla koja računa povrišinu trougla

class Trougao{
    private $a ;
    private $b ;
    private $c ;

    private static function usloviZaTrougao ( $a, $b, $c ){
        return ( $a > 0 &&  $b > 0 && $c > 0 && $a + $b > $c && $a + $c > $b && $b + $c > $a);
    }
    public function __construct( $a , $b , $c ){
        if (self::usloviZaTrougao($a , $b , $c )){
            $this -> a = $a;
            $this -> b = $b;
            $this -> c = $c;
        }else{
            echo "<p>Parametars not valid.</p>";
        }
    }
    //set
    public function setA( $a ){
        if ( self::usloviZaTrougao ( $a, $this-> b, $this->c)){
            $this -> a = $a;
        }else{
            echo "<p>Parametar $a not valid.</p>";

        }
    }
    public function setB( $b ){
        if ( self::usloviZaTrougao ( $this -> a, $b, $this->c)){
            $this -> b = $b;
        }else{
            echo "<p>Parametar $b not valid.</p>";

        }
    }
    public function setC( $c ){
        if ( self::usloviZaTrougao ( $this-> a, $this-> b, $c)){
            $this -> c = $c;
        }else{
            echo "<p>Parametar $c not valid.</p>";

        }
    }
    //get
    public function getA(){
        return $this -> a;
    }
    public function getB(){
        return $this -> b;
    }
    public function getC(){
        return $this -> c;
    }
    public function obim(){
        return ( $this -> a + $this -> b  + $this-> c);
    }
    public function povrsina(){
        $s = ( $this -> a + $this -> b + $this -> c )/2;
        $pov = sqrt ( $s * ( $s - $this -> a) * ($s - $this -> b ) * ( $s - $this -> c));
        return $pov;
    }
    public function ispis ( ){
        echo "<p>Trogao sa stranicama a = ".$this -> a."cm. b = ".$this -> b." c = ".$this -> c." cm .  Ima obim ".$this -> obim()." cm. I povrsinu " .$this-> povrsina(). " cm2 .</p>";
    }
}




?>