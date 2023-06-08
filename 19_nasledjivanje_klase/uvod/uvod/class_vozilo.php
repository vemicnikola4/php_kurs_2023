<?php
//inkapsulacija izguglaj?
class Vozilo{
    //privatnna polja ne mogu da se manjaju van klase.
    // private $boja;
    // private $tip;
    protected $boja;
    protected $tip;
    public function __construct( $boja, $tip ){
        $this -> setBoja( $boja );
        $this -> setTip( $tip );
    }
    public function setBoja($boja){
        $this -> boja = $boja;
    }
    public function setTip($tip){
        $this -> tip = $tip;
    }
    public function getBoja(){
        return $this -> boja;
    }
    public function getTip(){
        return $this -> tip;
    }
    public function voziVozilo(){
        echo "<p>Vozilo ".$this->tip." Boje: ".$this->boja." u pokretu.</p>";
    }
}
?>