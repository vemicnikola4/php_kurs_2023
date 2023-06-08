<?php
//hocemo da ove tri klase apstrakujemo u ovu super klasu.
//Mozemo daprimetimo da su zajednicke stvari za ove klase 
//metode obim i povrsina.

//4 principa OOP(abstraction, inheritance, encapsulation, and polymorphism)
//inkapsulacija( Sta j eprivate sta protected sta public)
//nasledjivanje 
//polimorfizam(  polimorfna metoda: jedna metoda sa istim potpisom u podklasama )
//apstrakcija ( jedna super klasa granamo nadklase apstakujemo)

//klasa postaje abstraktna ako sadrzi barem jednu abstraktnu metodu .
//Dodajemo joj abstract ispred class
//Ne mogu se kreirati objekti abstraktne klase.
abstract class Oblik{

    private $nazivOblika;
    const TROUGAO = "Trougao";
    const KVADRAT = "Kvadrat";
    const PRAVOUGAONIK = "Pravougaonik";
    const ROMB = "Romb";

    public function __construct( $nazivOblika ){
        $this -> nazivOblika = $nazivOblika;
    }
    //Jedno resenje je da ostavimo prazne metode
    //Postoje bolji mehanizmi
    //ovako prazne stoje kao zaglavlje kako bi podklase mogle da ih korisite.
    // public function obim(){

    // }
    // public function povrsina (){

    // }
    //zato dodajemo apstract da bi metoda mogla biti bez tela
    //abstract znaci da nece biti implementacije u ovoj klasi ali takodje znaci da ce podklase morati da ponude implementaciju ove metode
    //ako neka klasa sadrzi abstraktnu metodu
        //1. nema implementacije u toj klasi
        //2. izvedene klase moraju da ponude implementaciju ove metode

        //override vs abstract.
    public abstract function obim();
    public abstract function povrsina();

    public function ispis(){
        echo "<p>".$this -> nazivOblika." ".$this -> obim ()." ".$this -> povrsina (). "</p>";
    }
}

//interfejs??
//Klasa koja nema polja .
//Sve metode su javne
//Skup javnih metoda. 
//Podklase koje nasleduju moraju da implemetiraju te metode.
//umesto class ide kljucna rec interface'
//sve metode su abstraktne
//Moze da se shvati kao neki skup pravila koje moramo da isprati unutar podklasa.(izvedenih klasa).
//skup abstraktnih metoda
//abstraktna klasa za razliku od interface ima bar jednu abstraktnu metodu dok kod interface sve metode su abstraktne.
?>