<?php
require_once "knjiga.php";
// U fajlu zbira_zadataka.php kreirati klasu ZbirkaZadataka izvedenu iz klase
// Knjiga, i koja sadrži dodatno polje broj zadataka (broj koji ne može biti manji
// od 0).
// Od javnih metoda treba realizovati:
// ➢ Konstruktor koji postavlja sva navedena polja,
// ➢ Setere i getere koji su potrebni,
// ➢ Override-ovati metodu stampa() koja štampa sve podatke o zbirci (u
// ispisu ovih podataka možete koristiti i metodu iz osnovne klase za ispis
// knjige).
// ➢ Override-ovati metodu jedinicnaCena(). Za zbirku zadataka, jedinična
// cena računa se kao prosečna cena jednog zadatka po stranici (opširnije
// rečeno, imamo prosečan broj zadataka po stranici (ukupan broj
// zadataka podeljen ukupnim brojem stranica), a zatim taj broj delimo
// ukupnom cenom knjige čime dobijamo prosečnu cenu jednog zadatka
// po stranici).

class ZbirkaZadataka extends Knjiga{
    private $brojZadataka;

    public function __construct ($naslov, $brojStrana, $cena,$brojZadataka){
        parent::__construct($naslov, $brojStrana, $cena);
        $this -> setBrojZadataka ( $brojZadataka);
    }

    public function setBrojZadataka ($brojZadataka){
        if ( Knjiga::uslov($brojZadataka)){
            $this -> brojZadataka = $brojZadataka;
        } 
    }
    public function getBrojZadataka(){
        return $this -> brojZadataka;
    }
    public function stampa(){
        echo "<p>Knjiga: ".$this -> getNaslov() ." Broj strana: ".$this->getBrojStrana()." Cena: ".$this -> getCena()." Broj zadataka: ".$this -> brojZadataka." Jedinicna cena: ".$this -> jedinicnaCena()."</p>";
    }
    // ➢ Override-ovati metodu jedinicnaCena(). Za zbirku zadataka, jedinična
// cena računa se kao prosečna cena jednog zadatka po stranici (opširnije
// rečeno, imamo prosečan broj zadataka po stranici (ukupan broj
// zadataka podeljen ukupnim brojem stranica), a zatim taj broj delimo
// ukupnom cenom knjige čime dobijamo prosečnu cenu jednog zadatka
// po stranici).
    public function jedinicnaCena(){
        return ( $this -> brojZadataka / $this -> getBrojStrana() ) / $this -> getCena();
    }

}




?>