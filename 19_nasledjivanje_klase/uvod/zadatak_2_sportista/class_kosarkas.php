<?php
require_once "class_sportista.php";

// Napraviti klasu Košarkaš koja ima atribute:
// ime, prezime, godina rođenja, grad rođenja i poeni (niz poena koje je postizao na utakmicama).

class Kosarkas extends Sportista{
    protected $poeni;

    public function __construct ( $ime, $prezime, $godinaRodjenja, $gradRodjenja, $poeni){
        parent::__construct ( $ime, $prezime, $godinaRodjenja, $gradRodjenja );
        $this -> setPoeni ( $poeni );

    }

    public function setPoeni ( $poeni ){
        if ( is_array ( $poeni ) && !empty( $poeni ) && isset ( $poeni[0] )){
            $poeniCorect = true;
            for ( $i = 0; $i < count ( $poeni ); $i++ ){
                if ( !is_int($poeni[$i]) || is_array( $poeni[$i])){
                    $poeniCorect = false;
                    break;
                }
            }
            if ( $poeniCorect ){
                $this -> poeni = $poeni;
            }else{
                echo "<p>No valid parametar passed in public function setPoeni! Must be tipe indexed array,not empty. With int values.</p>";
                exit;
            }
        }else{
            echo "<p>No valid parametar passed in public function setPoeni! Must be tipe indexed array,not empty. With int values.</p>";
            exit;
        }
    }
    public function getPoeni ( ){
        $poeni =  $this-> poeni;
        $poeniString = "";
        for ( $i =0; $i < count ( $poeni); $i++ ){
            $poeniString .= $poeni[$i] ." ,";
        }
        return $poeniString;
    }
    public function getPoeniArray ( ){
       return  $this-> poeni;

    }
    public function ukupnoPoena ( ){
        $ukupno =0;
        for ( $i = 0; $i < count ( $this->poeni ); $i++ ){
            $ukupno += $this->poeni[$i];
        }
        return $ukupno;
    }
    public function prosekPoena (){
        return $this -> ukupnoPoena ( ) / count ( $this -> getPoeniArray ( ) );
    }

    public function ispis ( ){
        echo "<tr><td>". $this->ime ."</td><td>". $this->prezime ." </td><td>". $this->godinaRodjenja ." </td><td>". $this->gradRodjenja ." </td><td> ".$this->getPoeni()." </td><td>".$this-> ukupnoPoena()."</td><td>".number_format($this->prosekPoena(),2,",",".")."</td></tr>";
    }
}
?>