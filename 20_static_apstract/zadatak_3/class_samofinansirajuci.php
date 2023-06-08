<?php
require_once "class_student.php";
// Kreirati klasu SamofinansirajuciStudent koja nasleđuje klasu Student, ima zaštićeno polje $prijavljeniESPB (broj ESPB bodova koje je prijavio da sluša u narednoj školskoj godini, ne može biti manji od 35, veći od 60, i zbir osnovijenih i pirjavljenih bodova ne može biti veći od 300), a koja računa visinu školarine po fomuli: Ako je prosečna ocena manja od 8, onda je školarina 1900 * prijavljeniESPB, u suprotnom je 1600 * prijavljeniESPB. Cena prijave ispita je 400 din.

class SamofinansirajuciStudent extends Student{
    protected $prijavljeniESPB;

    private static function uslovZaPrijavljeniESPB($prijavljeniESPB, $osvojeniESPB ){
        if ( $osvojeniESPB >= 265 ){
            return ( is_int( $prijavljeniESPB ) 
            && $prijavljeniESPB + $osvojeniESPB == 300 );
        }else{
            return( is_int( $prijavljeniESPB ) 
            && $prijavljeniESPB >= 35 
            && $prijavljeniESPB <= 60 
            && $prijavljeniESPB + $osvojeniESPB <= 300 );
        } 
            
    }
    public function __construct( $ime, $osvojeniESPB,$prosecnaOcena, $prijavljeniESPB ){
        parent::__construct ( $ime, $osvojeniESPB,$prosecnaOcena );
        if (SamofinansirajuciStudent::uslovZaPrijavljeniESPB($prijavljeniESPB, $this -> osvojeniESPB )){
            $this -> prijavljeniESPB = $prijavljeniESPB;
            $this -> status = Student::STATUSSAMOFINANSIRAJUCI;
        }else{
            echo "<p>Error not valid parametar  $prijavljeniESPB passed in public function __construct. Must be type int >=35 <=60. Osvojeni + prijavljeni Must not be >300. If Osvojeni >= 265 Osvojeni + Prijavljeni must be  =300 </p>";
            exit;
        } 
    }
    public function setPrijavljeniESPB( $prijavljeniESPB ){
        if ( SamofinansirajuciStudent::uslovZaPrijavljeniESPB($prijavljeniESPB, $this -> osovojeniESPB )){
            $this -> prijavljeniESPB = $prijavljeniESPB;
        }else{
            echo "<p>Error not valid parametar passed in setPrijavljeniESPB. Must be type int >=35 <=60. Osvojeni + prijavljeni Must not be >300. If Osvojeni >= 265 Osvojeni + Prijavljeni must be  =300 </p>";
            exit;
        }
    }
    public function getPrijavljeniESPB(){
        return $this -> prijavljeniESPB;
    }
    // Ako je prosečna ocena manja od 8, onda je školarina 1900 * prijavljeniESPB, u suprotnom je 1600 * prijavljeniESPB. Cena prijave ispita je 400 din.
       public function skolarina(){
        if ( $this -> prosecnaOcena < 8 ){
            return 1900 * $this -> prijavljeniESPB;
        }else{
            return 1600 * $this -> prijavljeniESPB;

        }
    }
    public function cenaPrijaveIspita(){
        return 400;
    }

    public function ispis(){
        
        echo "<tr><td>". $this -> ime ."</td><td>".$this-> status."</td><td>" .$this ->osvojeniESPB ."</td><td>".$this -> prosecnaOcena."</td><td>".$this -> cenaPrijaveIspita()." </td><td>". $this -> skolarina() ."</td><td>".$this -> prijavljeniESPB."</td></tr>";
        
    }


}


?>







<!-- else{
                echo "<p>Error not valid parametar passed in uslovZaPrijavljeniESPB. Must be type int >=35 <=60. Osvojeni + prijavljeni Must not be >300. If Osvojeni >= 265 Osvojeni + Prijavljeni must be  =300 </p>";
            }  -->