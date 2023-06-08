<?php
require_once "class_kredit.php";

// Iz klase Kredit izvesti klasu AutoKredit koja od dodatnih polja sadrži auto kamatu (double) i sadrži svoje verzije metoda za ispis i računanje mesečne rate po formuli:

//     kamata = osnovica * god_otplate * (god_kamata + auto_kamata) / 100;
//     ukupan_iznos = osnovica + kamata;
//     mesecna_rata = ukupan_iznos / (god_otplate * 12);
// protected $naziv;
// protected $osnovica;
// protected $godisnjaKamata;
// protected $brGodOtplate;
class AutoKredit extends Kredit{
    protected $autoKamata;

    public function __construct ( $osnovica , $godisnjaKamata, $brGodOtplate, $autoKamata){
        parent::__construct ( Kredit::AUTOKREDIT, $osnovica , $godisnjaKamata, $brGodOtplate);
        $this -> autoKamata = $autoKamata;
    }

//     kamata = osnovica * god_otplate * (god_kamata + auto_kamata) / 100;
//     ukupan_iznos = osnovica + kamata;
//     mesecna_rata = ukupan_iznos / (god_otplate * 12);
    public function setAutoKamata($autoKamata){
        if ( is_numeric( $autoKamata) && $autoKamata > 0 ){
            $this -> autoKamata = $autoKamata ;
        }else{
            echo "<p>Not valid parametar passed in setAutoKamata.</p>";
        }
    }
    public function getAutoKamata(){
        return $this -> autoKamata;
    }
    public function mesecnaRata(){
        $kamata = $this -> osnovica * $this -> brGodOtplate * ( $this -> godisnjaKamata  + $this -> autoKamata ) / 100;
        $ukupan_iznos = $this -> osnovica + $kamata;
        return $ukupan_iznos / ( $this -> brGodOtplate * 12 );
    }
}



?>