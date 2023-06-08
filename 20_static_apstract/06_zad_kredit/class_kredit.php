<?php
// Kreirati apstraktnu klasu Kredit koja od zaštićenih članova sadrži naziv (string), osnovica (double), godišnja kamata (double), i broj godina otplate (int). Od konstruktora, klasa sadži konstruktor sa četiri parametra. Klasa sadrži metode za ispis i apstraktnu metodu za računanje mesečne rate kredita.

abstract class Kredit{
    protected $naziv;
    protected $osnovica;
    protected $godisnjaKamata;
    protected $brGodOtplate;
    const AUTOKREDIT = "Auto kredit";
    const STAMBENIKREDIT = "Stambeni kredit";
    public function __construct ($naziv, $osnovica, $godisnjaKamata, $brGodOtplate ){
        $this -> setNaziv ( $naziv );
        $this -> setOsnovica ( $osnovica );
        $this -> setGodisnjaKamata ( $godisnjaKamata );
        $this -> setBrGodOtplate ( $brGodOtplate );
    }
    abstract public function mesecnaRata();
     //set 

    public function setNaziv ( $naziv ){
        if ( is_string ($naziv) && $naziv !== "" ){
            $this -> naziv = $naziv;
        }else{
            echo "<p>No valid parametar passed in setNaziv.</p>";
            exit;
        }
    }
    public function setOsnovica ( $osnovica ){
        if ( is_int ($osnovica) && $osnovica > 0 ){
            $this -> osnovica = $osnovica;
        }else{
            echo "<p>No valid parametar passed in setOsnovica.</p>";
            exit;
        }
    }
    public function setGodisnjaKamata ( $godisnjaKamata ){
        if ( is_int ($godisnjaKamata) || is_float ($godisnjaKamata)  ){
            if ( $godisnjaKamata >= 0 ){
                $this -> godisnjaKamata = $godisnjaKamata;

            }else{
                echo "<p>No valid parametar passed in setGodisnjaKamata.</p>";
                exit;
            }
        }else{
            echo "<p>No valid parametar passed in setGodisnjaKamata.</p>";
            exit;
        }
    }
    public function setBrGodOtplate ( $brGodOtplate ){
        if ( is_int ($brGodOtplate) && $brGodOtplate > 0 ){
            $this -> brGodOtplate = $brGodOtplate;
        }else{
            echo "<p>No valid parametar passed in setBrGodOtplate.</p>";
            exit;
        }
    }

    //get 
    public function getNaziv (  ){
        return $this ->naziv;
    }
    public function getOsnovica (  ){
        return $this ->osnovica;
    }
    public function getBrGodOtplate (  ){
        return $this ->brGodOtplate;
    }
    public function getGodisnjaKamata (  ){
        return $this -> godisnjaKamata;
    }

    public function ispis(){
        echo "<p>Vrsta Kredita ".$this -> naziv." Osnovica kredita ".$this -> osnovica." Godisnja kamata " .$this -> godisnjaKamata ." % . Period otplate ".$this -> brGodOtplate." god. Mesecna rata kredita ".number_format($this -> mesecnaRata(),2,",","."). " Eura</p>";
    }
}


?>