<?php
require_once "class_vozilo.php";
class Automobil extends Vozilo{

    //klasa automobil nasledjuje sva polje i metode iz klase vozilo Ali kada bi sad ovde kreirali metodu morali bi da dohvatamo boju i tip sa geterima. Jer u pdklasama ne moze da pristupa direktno atributima.
    //Moze direktno da pristupa samo public poljima i metodama iz klase vozilo. 
    //A ona polja i metode koje su private se nasledjuju ali se ne moze direktno pristupiti.

    //Jedno resenje je da dohvatamo privatna polja dohvatamo sa geterima u podklasama
    // public function voziAutomobil(){
    //     echo "<p>Automobil ".$this->getTip()." Boje: ".$this->getBoja()." u pokretu.</p>";
    // }


//Drugo resenje je atribute osnovne klase podesimo na protected. Sto znaci da atributima mogu da pristupe izvedene klase ali van klase ne.
//Atrributi podeseni na protected
    public function voziAutomobil(){
        echo "<p>Automobil ".$this->tip." Boje: ".$this->boja." u pokretu.</p>";
    }
    

}


?>