<?php
require_once "class_student.php";
// Kreirati klasu BudzetskiStudent koja nasleđuje klasu Student. Visinina školarine jednaka je (300 - osvojeniESPB) * 2000. A cena prijave ispita je 100 din ukoliko student nije očistio prethodne godine, ako jeste onda je cena 0 dinara. Student je očistio jednu godinu studija ako je osvojio 60 ESPB poena.'

class BudzetskiStudent extends Student{

    public function __construct( $ime, $osvojeniESPB,$prosecnaOcena ){
        parent::__construct ($ime, $osvojeniESPB,$prosecnaOcena);
        $this -> status = Student::STATUSBUDZET;
    }

    public function skolarina(){
        return (300 - $this -> osvojeniESPB) * 2000;
    }

    public function cenaPrijaveIspita(){
        if ( $this -> osvojeniESPB % 60 == 0){
            return 0;
        }else{
            return 100;
        }
    }
    public function setOsvojeniESPB($osvojeniESPB){
        if (is_int($osvojeniESPB) && $osvojeniESPB >= 0 && $osvojeniESPB <=300){
            $this -> osvojeniESPB = $osvojeniESPB;
        }else{
            echo "<p>Not valid parametar passed in setOsvojeniESPB must ne int >=0 <=300 </p>";
        }
    }
}

?>