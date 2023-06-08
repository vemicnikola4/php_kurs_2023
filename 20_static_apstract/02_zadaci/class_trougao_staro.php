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

    public function __construct( $a, $b, $c) {
        if ( $a > 0 && $b > 0 && $c > 0 && ( $a + $b ) > $c  && ( $a + $c ) > $b  && ( $b + $c ) > $a ){
            $this -> a = $a;
            $this -> b = $b;
            $this -> c = $c;
            //ovde direktno zadajemo vrednosti poljima.
            //tipican primer za uslovljena polja.
            //
            
            // $this -> setA( $a );
            // $this -> setB( $b );
            // $this -> setC( $c );
            
        }else{
            echo "<p>No valid parametars.</p>";
            exit;
        }
    }
    public function setA( $a ){
        if ( $a > 0 && ( $a + $this -> b ) > $this -> c  && ( $a + $this -> c ) > $this -> b  && ( $this -> b + $this -> c ) > $a ){
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
        if ( $b > 0 && ( $this -> a +  $b ) > $this -> c  && ( $this -> a + $this -> c ) > $b  && ( $b + $this -> c ) > $this -> a ){
            $this -> b = $b;
        }else{
            echo "<p>Ne moze da se promeni vrednost stranice b !</p>";
        }
    }
    
    public function setC( $c ){
        if ( $c > 0 && ( $this -> a +  $c ) > $this -> b  && ( $this -> a + $this -> b ) > $c  && ( $c + $this -> b ) > $this -> a ){
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
    $s = ( $this -> a + $this -> b + $this -> c )/2;
    $pov = sqrt ( $s * ( $s - $this -> a) * ($s - $this -> b ) * ( $s - $this -> c));
    return $pov;
  }
}

$t1 = new Trougao ( 7,6,8);
echo $t1 -> obimTrougla();
echo "<br>";
echo $t1 -> povrsinaTrougla();
// var_dump ( $t1 );
//kada pozivamo bilo koju metodu koja nije konstruktor vec je  kreiran sva polja su kreirana.
//set postavi vrednost polja ( naknadno )

?>