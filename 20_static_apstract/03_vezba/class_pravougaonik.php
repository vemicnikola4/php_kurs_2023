<?php
class Pravougaonik {

    private $a;
    private $b;

    private static function usloviZaPravougaonik ( $a, $b ){
        return ( $a > 0 || $b > 0 );
    }
    public function __construct ( $a , $b){
        if (self:: usloviZaPravougaonik ( $a , $b )){
            $this -> a = $a;
            $this -> b = $b;
        }else{
            echo "<p>Parametars not valid</p>";
        }
        
    }
    public function setA( $a ){
        if ( self:: usloviZaPravougaonik ( $a , $this -> b )){
            $this -> a = $a;
        }else{
            echo "<p>Parameta $a not Valid!</p>";
        }
    }
    public function setB( $b ){
        if ( self:: usloviZaPravougaonik ( $this -> a , $b )){
            $this -> b = $b;
        }else{
            echo "<p>Parameta $b not Valid!</p>";

        }
    }
    public function getA(  ){
        return $this -> a ;
    } 
    public function getB(  ){
        return $this -> b ;
    }
    public function obim( ){
        return (($this -> a * 2)+($this-> b * 2));
    }
    public function povrsina( ){
        return $this -> a * $this -> b;
    }
    public function ispis(){
        echo "<p>Pravougaonik sa stranicam a = ".$this -> a." cm . b = ".$this -> b." cm. Ima obim ".$this -> obim()." a povrsine ".$this -> povrsina()." </p>";
    }

}

?>