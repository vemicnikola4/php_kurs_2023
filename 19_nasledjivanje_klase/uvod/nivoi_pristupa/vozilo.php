<?php

class Vozilo{
    public $javnoPolje;
    protected $zasticenoPolje;
    private $privatnoPolje;

    public function __construct($javnoPolje, $zasticenoPolje,$privatnoPolje){
        $this -> javnoPolje = $javnoPolje;
        $this -> zasticenoPolje = $zasticenoPolje;
        $this -> privatnoPolje = $privatnoPolje;
    }

    public function ispis (){
        echo "<p>".$this->javnoPolje." ". $this->zasticenoPolje." " .$this->privatnoPolje. "</p>";
    }
}


?>