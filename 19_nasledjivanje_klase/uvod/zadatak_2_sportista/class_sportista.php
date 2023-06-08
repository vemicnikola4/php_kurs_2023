<?php
// Napraviti klasu Sportista, koja ima atribute:
// ime, prezime, godina rođenja i grad rođenja.


// Napraviti klasu Košarkaš koja ima atribute:
// ime, prezime, godina rođenja, grad rođenja i poeni (niz poena koje je postizao na utakmicama).

abstract class Sportista {
    protected $ime;
    protected $prezime;
    protected $godinaRodjenja;
    protected $gradRodjenja;

    public function __construct( $ime, $prezime, $godinaRodjenja, $gradRodjenja ){
        $this -> setIme ( $ime );
        $this -> setPrezime ( $prezime );
        $this -> setGodinaRodjenja ( $godinaRodjenja );
        $this -> setGradRodjenja ( $gradRodjenja );
    }

    //set 
    public function setIme( $ime ){
        if ( is_string ( $ime ) && $ime !== "" ){
            $this-> ime = $ime;
        }else{
            echo "<p>No valid parametar passed in public function setIme! Must be tipe string and not empty.</p>";
            exit;

        }
    }
    public function setPrezime( $prezime ){
        if ( is_string ( $prezime ) && $prezime !== "" ){
            $this->prezime = $prezime;
        }else{
            echo "<p>No valid parametar passed in public function setPrezime! Must be tipe string and not empty.</p>";
            exit;

        }
    }
    public function setGodinaRodjenja( $godinaRodjenja ){
        if ( is_int( $godinaRodjenja ) && $godinaRodjenja > 1930 && $godinaRodjenja <= 2020 &&  !empty( $godinaRodjenja)){
            $this->godinaRodjenja = $godinaRodjenja;

        }else{
            echo "<p>No valid parametar passed in public function setGodinaRodjenja! Must be tipe int and > 1930 and <= 2020.</p>";
            exit;

        }
    } 
    public function setGradRodjenja ( $gradRodjenja ){
        if ( !empty( $gradRodjenja) && is_string ( $gradRodjenja )){
            $this->gradRodjenja = $gradRodjenja;

        }else{
            echo "<p>No valid parametar passed in public function setGradRodjenja! Must be tipe string and not empty.</p>";
            exit;
        }
    }
    
    //get
    public function getIme ( ){
        return $this-> ime;
    }
    public function getPrezime ( ){
        return $this-> prezime;
    }
    public function getGodinaRodjenja ( ){
        return $this-> godinaRodjenja;
    }
    public function getGradRodjenja ( ){
        return $this-> gradRodjenja;
    }
    


    public abstract function ispis ( );
}

?>