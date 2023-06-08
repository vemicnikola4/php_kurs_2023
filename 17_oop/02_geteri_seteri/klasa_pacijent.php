<?php
// U klasi Pacijent, u odgovarajućim metodama proveriti da li je visina između 0 i 250, a težina između 0 i 550.

class Pacijent{
    private $ime;
    private $visina;
    private $tezina;

    public function stampaj(){
        $bmi = $this->bmi();
        if ($this->kritican() ){
            $kritican = " je kritican";
        }else{
            $kritican = "nije kritican";
        }
        echo "<p>Pacijent ".$this-> ime." . Visina: ".$this->visina." Tezina ".$this->tezina."
        BMI = ". number_format($bmi,"2",".",",") . " $kritican .</p>";
        // ($this -> kritican()?"Kritican":"Nije kritican" skraceni ispis
    }

    public function set_ime($ime){
        if ( $ime !== "" ){
            $this-> ime = $ime;
        }else{
            $this-> ime = "NN";

        }
    }
    public function set_visina($visina){
        if ( $visina >= 0 &&  $visina <= 2.50 ){
            $this-> visina = $visina;
        }elseif( $visina < 0 ){
            $this-> visina = 0;
        }else{
            $this-> visina = 2.50;
        }
    }
    public function set_tezina($tezina){
        if ( $tezina >= 0 &&  $tezina <= 550 ){
            $this-> tezina = $tezina;
        }elseif( $tezina < 0 ){
            $this-> tezina = 0;
        }else{
            $this-> tezina = 550;
        }
    }
    public function get_ime(){
        return $this->$ime;
    }
    public function get_visina(){
        return $this->$visina;
    }
    public function get_tezina(){
        return $this->$tezina;
    }
    private function bmi(){
        $bmi = $this->tezina/($this->visina * $this-> visina);//pow($this->visina,2) na kvadrat
        return $bmi;
    }
    private function kritican(){//privatna funkcija pravi se da bi je pozivali u klasi i sa njom radili. Ne moze se pozvati izvan klase
        return( $this-> bmi() < 15 || $this-> bmi() > 40);
        
    }
}

$p_1 = new Pacijent();
$p_1 -> set_ime( "Nemanja Pavlovic");
$p_1 -> set_visina( 1.98 );
$p_1 -> set_tezina( 120 );
$p_1 -> stampaj();

?>