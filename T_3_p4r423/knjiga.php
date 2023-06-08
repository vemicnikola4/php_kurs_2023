<?php
// U fajlu knjiga.php kreirati apstraktnu klasu Knjiga koja od privatnih polja
// sadrži:
// ➢ naslov (naslov mora sadržati barem jedan karakter)
// ➢ broj strana (broj strana ne može biti manji od 0)
// ➢ cena (cena ne može biti manja od 0).
// Od javnih metoda klasa Knjiga sadrži:
// ➢ Konstruktor koji postavlja sva polja,
// ➢ Setere i getere za sva polja,
// ➢ Polimorfmnu metodu stampa() koja štampa sve podatke o knjizi,
// ➢ Apstraktnu metodu jedinicnaCena() koja će biti implementirana u
// izvedenim klasama.

abstract class Knjiga{

    private $naslov;
    private $brojStrana;
    private $cena;

    public static function uslov( $podatak ){
        return ( is_int( $podatak) && $podatak >=  0);
    }
    public function __construct ( $naslov, $brojStrana, $cena ){
        $this -> setNaslov ($naslov);
        $this -> setBrojStrana ($brojStrana);
        $this -> setCena ($cena);
    }

    public function getNaslov(){
        return $this-> naslov;
    }
    public function getBrojStrana(){
        return $this-> brojStrana;
    }
    public function getCena(){
        return $this-> cena;
    }

    public function setNaslov( $naslov ){
        if ( is_string( $naslov) && $naslov != ""){
            $this -> naslov =$naslov;
        }else{
            echo "<p>Error propreti passed in setNaslov not valid. Must be type string and not empty</p>";
            exit;
        }
    }
    public function setBrojStrana( $brojStrana ){
        if (Knjiga::uslov($brojStrana)){
            $this -> brojStrana =$brojStrana;
        }else{
            echo "<p>Error properti passed in setBrojStrana not valid. Must be type in and >= 0</p>";
            exit;

        }
    }
    public function setCena( $cena ){
        if ( Knjiga::uslov($cena)){
            $this -> cena = $cena;
        }else{
            echo "<p>Error properti passed in setCena not valid. Must be type in and >= 0</p>";
            exit;
        }
    }
    public function stampa(){
        // echo "<p>Knjiga: ".$this -> naslov ." Broj strana: ".$this->brojStrana." Cena: ".$this -> cena."</p>";
    }
    // ➢ Apstraktnu metodu jedinicnaCena() koja će biti implementirana u
// izvedenim klasama.
    abstract public function jedinicnaCena();

}


?>