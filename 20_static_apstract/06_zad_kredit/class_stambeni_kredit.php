<?php
require_once "class_kredit.php";
// Takođe, iz klase Kredit izvesti i klasu StambeniKredit koja nema dodatna polja, i sadrži samo svoju verziju metode za računanje mesečne rate po formuli:

//     mesecna_kamata = god_kamata / 12 / 100;
//     stepen = pow(1 + mesecna_kamata, god_otplate * 12);
//     mesecna_rata = (osnovica * mesecna_kamata * stepen) / (stepen - 1);
    
class StambeniKredit extends Kredit{


    public function __construct ( $osnovica , $godisnjaKamata, $brGodOtplate,){
        parent::__construct ( Kredit::STAMBENIKREDIT, $osnovica , $godisnjaKamata, $brGodOtplate);
    }

    public function mesecnaRata(){
        $mesecnaKamata = $this -> godisnjaKamata / 12 /100;
        $stepen = pow ( 1 + $mesecnaKamata , $this -> brGodOtplate * 12 );
        return ( $this -> osnovica * $mesecnaKamata * $stepen ) / ($stepen - 1);
    }
}



?>