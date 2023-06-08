<?php
// Napraviti klasu Osoba, koja ima atribute:
// ime, prezime, godina rođenja.


// Napraviti klasu Zaposleni koja nasleđuje klasu Osoba i koja sadrži atribute:
// ime, prezime, godina rođenja, plata, pozicija.

// Realizovati konstruktore, getere, setere i funkcije za ispis u klasama Osoba i Zaposleni.


class Osoba{
    protected $ime;
    protected $prezime;
    protected $godRodjenja;

    public function __construct($ime,$prezime,$godRodjenja){
        $this -> setIme ( $ime );
        $this -> setPrezime ( $prezime );
        $this -> setGodRodjenja ( $godRodjenja );
    }

    public function setIme( $ime ){
        $this -> ime = $ime;
    }

    public function setPrezime( $prezime ){
        $this -> prezime = $prezime;
    }
    public function setGodRodjenja( $godRodjenja ){
        $this -> godRodjenja = $godRodjenja;
    }

    public function getIme(  ){
        return $this -> ime;
    }
    public function getPrezime(  ){
        return $this -> prezime;
    }
    public function getGodRodjenja(  ){
        return $this -> godRodjenja;
    }

    public function ispis(){
        echo "<p>Osoba: ".$this->ime."  ".$this->prezime." . Godina rodjenja: ".$this->godRodjenja."<p>";
    }

}

?>