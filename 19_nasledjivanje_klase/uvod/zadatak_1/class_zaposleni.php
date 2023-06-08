<?php
require_once ("class_osoba.php");

// Napraviti klasu Zaposleni koja nasleđuje klasu Osoba i koja sadrži atribute:
// ime, prezime, godina rođenja, plata, pozicija.


class Zaposleni extends Osoba{
    private $plata;
    private $pozicija;

    public function __construct( $ime, $prezime, $godRodjenja, $plata,$pozicija ){
        parent::__construct ( $ime, $prezime, $godRodjenja );
        $this -> setPlata( $plata );
        $this -> setPozicija( $pozicija );
    }

    public function setPlata ( $plata ){
        $this -> plata = $plata;
    }
    public function setPozicija ( $pozicija ){
        $this -> pozicija = $pozicija;
    }
    public function getPlata (){
        return $this -> plata;
    }
    public function getPozicija (  ){
        return $this -> pozicija;
    }

    //ako nazovemo metodu istokao i u nadklasi ne prijavljuje
    public function ispisZaposleni(){
        $this->ispis();
        echo "<p>Plata ". $this ->plata ." Pozicija:". $this ->pozicija."</p>";
    }
}




?>