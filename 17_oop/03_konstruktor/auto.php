<?php
class Auto{
    //polja
    private $marka;//equivalent to public. Polje ili atribut klase.
    private $boja;
    private $ima_krov;

    //metode
    //constructor
    public function __construct($marka,$boja,$ima_krov){
        $this -> set_marka($marka);
        $this -> set_boja($boja);
        $this -> set_ima_krov($ima_krov);
    }

    //GETERI (vracaju vrednosti polja)
    //uvek getere zoveno sa get_nesto

    public function get_marka(){
        return $this -> marka;
    }
    public function get_boja(){
        return $this -> boja;
    }
    public function get_ima_krov(){
        return $this -> ima_krov;
    }

    //SETERI postavljaju vretnosti polja

    public function set_marka($marka){
        if ( $marka != ""){//osiguramo se da nije prazan string prosledjen
            $this -> marka = $marka;
        }else{
            $this -> marka = "Fijat";
        }
    }
    public function set_boja($boja){
        $this -> boja = $boja;
    }
    public function set_ima_krov($ima_krov){
        if ( $ima_krov === true || $ima_krov === false){//obezbedimo se da $ima_krov jednaod te dvelogicke vrednosti.
            $this -> ima_krov = $ima_krov;
        }else{
            $this -> ima_krov = false;

        }
    }



    public function sviraj(){
        echo "<p>Beep! Beep!</p>";
    }

    public function ispis (){
        echo "<p>Auto marke ".$this-> marka." . Boje: ".$this-> boja;
        if ( $this -> ima_krov ){
            echo " ima krov.</p>";
        }else{
            echo " nema krov.</p>";

        }
       
    } 
}
//Kod ovakvog pavljenja objekata moze doci do odredjenih prepreka
//1. Kreiramo objekat
//2. Setujemo vrednosti polja
//3. Zovemo metode za Objekat. Kreiramo objekat.

//Problem moze da nastane ako korisnik(uslovno receno) prvo poziva npr neku metodu za ispis isl pre pozivanja setera.
//**KOnstruktor je posebna metoda koja ce da se pozove prilikom pravljenja objekata __construct() */
//Nacin da nateramo php da prvo postavimo vrednosti atributima je pomocu konstruktora.
// $a_1 = new Auto($vrednost_za_atribut);

// $a_1 = new Auto();
// $a_1 -> set_marka( "BMW" );
// $a_1 -> set_boja( "plava" );
// $a_1 -> set_ima_krov( false );

$a_1 = new Auto("BMW","plava",false);
// $a_1 = new Auto("BMW","plava",false);
//ako punovimo konstruktor on ce da kreira dva objekta a promenjivoj $a_1 dodelice vrednost ovog drugog objekta. A prvi ce se izbrisati iz memorije. Konstuktor se poziva samo jednom i on napravi objekat.
//Ako zelimo da dozvolimo da 
$a_1 -> ispis();
?>