<?php
//hocemo da ove tri klase apstrakujemo u ovu super klasu.
//Mozemo daprimetimo da su zajednicke stvari za ove klase 
//metode obim i povrsina.

//4 principa OOP(abstraction, inheritance, encapsulation, and polymorphism)
//inkapsulacija( Sta j eprivate sta protected sta public)
//nasledjivanje 
//polimorfizam(  polimorfna metoda: jedna metoda sa istim potpisom u podklasama )
//apstrakcija ( jedna super klasa granamo nadklase apstakujemo)
class Oblik{

    private $nazivOblika;
    const TROUGAO = "Trougao";
    const KVADRAT = "Kvadrat";
    const PRAVOUGAONIK = "Pravougaonik";
    const ROMB = "Romb";

    public function __construct( $nazivOblika ){
        $this -> nazivOblika = $nazivOblika;
    }
    public function obim(){
        return 0; //za pocetak
    }
    public function povrsina (){
        return 0;
    }

    public function ispis(){
        echo "<p>".$this -> nazivOblika." ".$this -> obim ()." ".$this -> povrsina (). "</p>";
    }
}
?>