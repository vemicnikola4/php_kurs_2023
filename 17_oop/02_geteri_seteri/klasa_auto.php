<?php
class Auto{
    //polja
    private $marka;//equivalent to public. Polje ili atribut klase.
    private $boja;
    private $ima_krov;

    //metode
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



    function sviraj(){
        echo "<p>Beep! Beep!</p>";
    }

    function ispis (){
        echo "<p>Auto marke ".$this-> marka." . Boje: ".$this-> boja;
        if ( $this -> ima_krov ){
            echo " ima krov.</p>";
        }else{
            echo " nema krov.</p>";

        }
       
    } 
}
$a_1 = new Auto();
// $a_1 ->marka ="audi";Ne moze mu se pristupiti van klase.Privatni atributi se menjaju ipostavljaju  dohvataju pomocu getera i setera.
//Kada se kreira klasa:
//1. Sva polja postavimo kao privatna
//2.Za svako polje napisemo getere i setere
    //Geter dohvata polja
    //Seteri postavljaju vrednosti u setera

$a_1 -> set_marka("BMW 120c");
$a_1 -> set_ima_krov("string");

if ($a_1 -> get_ima_krov() === true ){
    echo "<p>Automobil ".$a_1-> get_marka(). " ima krov </p>";
}elseif($a_1 -> get_ima_krov() === false ){
    echo "<p>Automobil ".$a_1-> get_marka(). " nema krov </p>";
}else{
    echo "<p>Za Automobil ".$a_1-> get_marka(). " nije pravilno postavljena vrednost za polje ima_krov </p>";
}
echo $a_1->get_marka();//poziva se geter za polje marka geter vrati vrednost polja pa onda mi ispisemo tu vrednost.

//Kad je metoda public moze da se poziva i van klase

//private metoda ne moze dase izvan funkcije nego je pravimo da bi sa njom radili unutar klase.
?>