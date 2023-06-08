<?php
require_once ( "vozilo.php");

class Automobil extends Vozilo{
    private $brojVrata;

    //dodajemo jos jedno polje treba nam dodatno konstruktor

    public function __construct($javnoPolje, $zasticenoPolje,$privatnoPolje,$brojVrata){
        //ovaj konstrukt je mogao da pristupi priv polju nadklase (rajdovana metoda?)
        // $this ->javnoPolje = $javnoPolje;
        // $this ->zasticenoPolje = $zasticenoPolje;
        // $this ->privatnoPolje = $privatnoPolje;

        //pozvaceno konstruktor iz klase vozilo
        //ovako se poziva konstruktor iz nadklase.
        parent:: __construct($javnoPolje, $zasticenoPolje,$privatnoPolje);
        //2) postavi polja specificna za ovu klasu
        $this ->brojVrata = $brojVrata;
    }
    public function ispisAuto(){
        echo "<p>Automobil: ".$this->javnoPolje." ". $this->zasticenoPolje." ".$this->brojVrata." </p>";
        // " .$this->privatnoPolje. "</p>";
    }

    public function ispisAutoDva(){
        $this -> ispis();
    }

}



?>