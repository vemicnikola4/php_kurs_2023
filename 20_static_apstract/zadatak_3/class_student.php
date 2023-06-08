<?php
// Kreirati apstraktnu klasu Student koja od zaštićenih polja sadrži:
// $ime (string), 
// $osvojeniESPB (broj ESPB poena koje je osvojio do sada u toku školovanja), 
// $prosecnaOcena (broj). 


// Od javnih metoda sadrži getere, setere, konstruktor, metodu za ispisivanje podataka o studentu, kao i dve apstraktne metode:
// skolarina(), za računanje školarine (bez parametara)
// cenaPrijaveIspita(), za računanje cene prijave ispita (bez parametara).

abstract class Student{
    protected $ime;
    protected $osvojeniESPB;
    protected $prosecnaOcena;
    const STATUSBUDZET = "BUZDET REPUBLIKE SRBIJE";
    const STATUSSAMOFINANSIRAJUCI = "SAMOFINANSIRAJUCI";

    private static function uslovZaOsvojeniESPB( $noviBodovi, $prijavljeniBodovi ){
        return ( is_int($noviBodovi) && $noviBodovi >= 0 && $noviBodovi <=300 && $noviBodovi + $prijavljeniBodovi <=300 );
    }

    public function __construct( $ime, $osvojeniESPB,$prosecnaOcena){
        $this ->setIme($ime);
        $this ->setOsvojeniESPB($osvojeniESPB);
        $this ->setProsecnaOcena ($prosecnaOcena);
    }

    public function setIme($ime){
        if ( is_string($ime) && $ime != ""){
            $this->ime = $ime;
        }else{
            echo "<p>Error not valid parametar passed in setIme.Musut be string and not empty</p>";
            exit;
        }
    }
    public function setOsvojeniESPB($osvojeniESPB){
        if ( Student:: uslovZaOsvojeniESPB( $osvojeniESPB, $this->prijavljeniESPB )){
            $this->osvojeniESPB = $osvojeniESPB;
        }else{
            echo "<p>Error not valid parametar passed in setOsvojeniEspb.Musut be type int >=0 and novi + prijavljeni bodovi<=300</p>";
            exit;
        }
    }
    public function setProsecnaOcena($prosecnaOcena){
        if ( is_numeric($prosecnaOcena) && $prosecnaOcena <= 10 && $prosecnaOcena >= 5 ){
            $this->prosecnaOcena = $prosecnaOcena;
        }else{
            echo "<p>Error not valid parametar passed in setProsecnaOcena.Must be type int or float >=5  >=10</p>";
            exit;
        }
    }

    public function getIme(){
        return $this->ime;
    }
    public function getOsvojeniESPB(){
        return $this->osvojeniESPB;
    }
    public function getProsecnaOcena(){
        return $this->prosecnaOcena;
    }

    public abstract function skolarina();
    public abstract function cenaPrijaveIspita();

    public function ispis(){
        
        echo "<tr><td>". $this -> ime ."</td><td>".$this-> status."</td><td>" .$this ->osvojeniESPB ."</td><td>".$this -> prosecnaOcena."</td><td>".$this -> cenaPrijaveIspita()." </td><td>". $this -> skolarina() ."</td></tr>";
        
    }
    
    



}


?>