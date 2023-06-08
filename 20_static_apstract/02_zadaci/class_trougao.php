<?php
// Kreirati klasu Trougao koja od privatnih polja sadrži:
// a, b, c (vrednosti stranice trougla)
// Obezbediti odgovarajuće getere, setere, kao i konstruktor
// Napisati metodu obimTrougla koja računa obim trougla
// Napisati metodu povrsinaTrougla koja računa povrišinu trougla

class Trougao{
    private $a;
    private $b;
    private $c;

        //dodajemo ovu funkciju koja proverava da li od ovih parametara moze da se napravi objekat.
        //ne treba svaki objekat da ima ovu metodu vec je dovoljno da bude static.
    private static function uslovZaTrougao( $a, $b, $c ){
        return ( $a > 0 && $b > 0 && $c > 0 && ( $a + $b ) > $c  && ( $a + $c ) > $b  && ( $b + $c ) > $a );
    }
    public function __construct( $a, $b, $c) {
        if (  self::uslovZaTrougao( $a, $b, $c )){
            $this -> a = $a;
            $this -> b = $b;
            $this -> c = $c;
        }else{
            echo "<p>No valid parametars.</p>";
            exit;
        }
    }
    public function setA( $a ){
        if ( self::uslovZaTrougao( $a, $this -> b , $this ->c)){
            $this -> a = $a;
        }else{
            // Jeda opcija ovako a druga da ignorisemo promenu
            // $this -> a = 0;
            // $this -> b = 0;
            // $this -> c = 0;
            echo "<p>Ne moze da se promeni vrednost stranice a !</p>";
        }
    }
    public function setB( $b ){
        if ( self::uslovZaTrougao( $b, $this -> a , $this ->c)){
            $this -> b = $b;
        }else{
            echo "<p>Ne moze da se promeni vrednost stranice b !</p>";
        }
    }
    
    public function setC( $c ){
        if ( self::uslovZaTrougao( $c, $this -> b , $this ->a)){
            $this -> c = $c;
        }else{
            echo "<p>Ne moze da se promeni vrednost stranice c !</p>";
        }
    }
    //get
    public function getA(  ){
        return $this -> a ;
    }
    public function getB(  ){
        return $this -> b ;
    }
    public function getC(  ){
        return $this -> c ;
    }

// Napisati metodu obimTrougla koja računa obim trougla
    public function obimTrougla ( ){
        return $this -> a + $this -> b + $this -> c;
    }
// Napisati metodu povrsinaTrougla koja računa povrišinu trougla

  public function povrsinaTrougla(){
    $s = $this-> obimTrougla() /2;
    $pov = sqrt ( $s * ( $s - $this -> a) * ($s - $this -> b ) * ( $s - $this -> c));
    return $pov;
  }
}