<?php
require_once "knjiga.php";
// U fajlu udzbenik.php kreirati klasu Udzbenik izvedenu iz klase Knjiga, i koja
// sadrži dodatno polje tiraz (broj koji ne može biti manji od 0).
// Od javnih metoda treba realizovati:
// ➢ Konstruktor koji postavlja sva navedena polja,
// ➢ Setere i getere koji su potrebni,
// ➢ Override-ovati metodu stampa() koja štampa sve podatke o udzbeniku
// (u ispisu ovih podataka možete koristiti i metodu iz osnovne klase za
// ispis knjige).
// ➢ Override-ovati metodu jedinicnaCena(). Za udžbenik, jedinična cena je
// količnik cene knjige i broja tiraža.

class Udzbenik extends Knjiga{
    private $tiraz;

    public function __construct ( $naslov, $brojStrana, $cena ,$tiraz){
        parent::__construct ( $naslov, $brojStrana, $cena);
        $this -> setTiraz($tiraz);
    }


    public function setTiraz($tiraz){
        if (Knjiga::uslov($tiraz)){
            $this-> tiraz = $tiraz;
        }else{
            echo "<p>Error properti passed in setTiraz not valid. Must be type in and >= 0</p>";
            exit;
        }
    }
    public function stampa(){
        echo "<p>Knjiga: ".$this -> getNaslov() ." Broj strana: ".$this->getBrojStrana()." Cena: ".$this -> getCena()." Tiraz: ".$this ->tiraz." Jedinicna cena: ".$this -> jedinicnaCena()."</p>";
    }
    // ➢ Override-ovati metodu jedinicnaCena(). Za udžbenik, jedinična cena je
// količnik cene knjige i broja tiraža.
public function jedinicnaCena(){
    return $this -> getCena() / $this -> tiraz;
}
}

?>