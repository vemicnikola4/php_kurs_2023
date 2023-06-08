<?php
class Film {
    private $naslov;
    private $reziser;
    private $godIzdanja;
    private $ocene;

    //kada pravimo getere is setere atributi su uvek privatni
    //Mnogo je bolje da u construktoru poivamo setere nego da direktno dajemo vrednosti atributima.
    //oop se zasniva na par principa
    //nkapsulacija znaci 
    function __construct($naslov,$reziser,$godIzdanja,$ocene){
        $this -> setNaslov( $naslov );
        $this -> setReziser( $reziser );
        $this -> setGodIzdanja ( $godIzdanja );
        $this -> setOcene ( $ocene );
    }
    
    public function setNaslov($naslov){
        $this -> naslov = $naslov;
    }
    public function getNaslov(){
        return $this -> naslov;
    }
    public function setReziser($reziser){
        $this -> reziser = $reziser;
    }
    public function getReziser(){
        return $this -> reziser;
    }
    public function setGodIzdanja($godIzdanja){
        $this -> godIzdanja = $godIzdanja;
    }
    public function getGodIzdanja(){
        return $this -> godIzdanja;
    }
    public function setOcene($ocene){
        $this -> ocene = $ocene;
    }
    public function getOcene(){
        return $this -> ocene;
    }
    public function stampaj(){
        echo "<p>Film ".$this->naslov." . Reziser: ".$this -> reziser." . Godina izdanja: " .$this -> godIzdanja. " Ocene : ".implode(", ", $this->ocene)." . Prosecna ocena filma: ".$this -> prosek()."</p>";
    }
    public function prosek(){
        $sum = 0;
        foreach ( $this -> ocene as $ocena){
            $sum += $ocena;
        }
        $n = count ( $this -> ocene );
        return ($n > 0) ? ($sum / $n ) : 0;//if ( $n > 0){ return $sum/$n }else{ return 0}
        
    }
}



?>