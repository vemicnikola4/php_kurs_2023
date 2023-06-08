<?php
// Kreirati klasu Pacijent koja od polja sadrži:
// ime
// visina 
// tezina. 
// Od metoda sadrži:
// Stampaj() koja ispisuje sve podatke o pacijentu,
// Bmi(), koja vraća bmi vrednost pacijenta,
// Kritican(), koja vraća true ukoliko je bmi pacijenta manji od 15 ili veći od 40, a u suprotnom vraća false.
// Kreirati tri objekta ove klase i testirati metode.

class Pacijent{
    var $ime;
    var $visina;
    var $tezina;

    function stampaj(){
        $bmi = $this->bmi();
        if ($this->kritican() ){
            $kritican = " je kritican";
        }else{
            $kritican = "nije kritican";
        }
        echo "<p>Pacijent ".$this-> ime." . Visina: ".$this->visina." Tezina ".$this->tezina."
        BMI =". number_format($bmi,"2",".",",") . " $kritican .</p>";
        // ($this -> kritican()?"Kritican":"Nije kritican" skraceni ispis
    }
    function bmi(){
        $bmi = $this->tezina/($this->visina * $this-> visina);//pow($this->visina,2) na kvadrat
        return $bmi;
    }
    function kritican(){
        return( $this-> bmi() < 15 || $this-> bmi() > 40);
        //     return true;
        // }else{
        //     return false;
        // }
        // $bmi = $this->bmi();
        // return $bmi < 15 || $bmi >40;Moze i ovako da se uradi.
    }
}

$p_1 = new Pacijent();
$p_1 -> ime = "Milos";
$p_1 -> visina = 1.6;
$p_1 -> tezina = 115;

$p_2 = new Pacijent();
$p_2 -> ime = "Ilija";
$p_2 -> visina = 1.8;
$p_2 -> tezina = 70;

$p_3 = new Pacijent();
$p_3 -> ime = "Nada";
$p_3 -> visina = 1.63;
$p_3 -> tezina = 56;
$pacijenti = [$p_1,$p_2,$p_3];
// $p_1 -> stampaj();
// $p_2 -> stampaj();
// $p_3 -> stampaj();
for ( $i = 0; $i < count($pacijenti); $i++ ){
    $pacijenti[$i]->stampaj();
}
?>