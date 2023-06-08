<?php
require_once "class_kvadrat.php";

class Romb extends Kvadrat{
    private $ugao;

    public function __construct( $a, $ugao){
        parent::__construct( $a );
        Oblik::__construct(Oblik::ROMB);//pozivamo parent parenta da bi postavili nazivOblika na Romb
        $this -> setUgao ( $ugao );
    }
    public function getUgao(){
        return $this -> ugao;
    }
    public function setUgao ( $ugao ){
        if ( $ugao > 0 ){
            $this -> ugao = $ugao;
        }else{
            $this -> ugao = 0;
        }
    }
    
    //nasledjuje kvadrat koji nasledjuje oblik
    public function povrsina( ){
        return $this -> getA() * $this -> getA() * sin( $this -> ugao);
    }

   
}


?>