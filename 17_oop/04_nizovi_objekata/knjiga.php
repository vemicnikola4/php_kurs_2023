<?php
class Knjiga{
    private $naslov;
    private $autor;
    private $god_izdanja;
    private $broj_strana;
    private $cena;

    public function __construct($naslov,$autor,$god_izdanja,$broj_strana,$cena){
        $this-> set_naslov( $naslov );
        $this-> set_autor( $autor );
        $this-> set_god_izdanja( $god_izdanja );
        $this-> set_broj_strana( $broj_strana );
        $this-> set_cena( $cena );
    
    }
    public function set_naslov( $naslov ){
        if ( $naslov !== ""){
            $this-> naslov = $naslov;
        }else{
            echo "<p>Ime nijevalidno</p>";
        }

    }
    public function set_autor( $autor ){
        $this-> autor = $autor;

    }
    public function set_god_izdanja( $god_izdanja ){
        $this-> god_izdanja = $god_izdanja;

    }
    public function set_broj_strana( $broj_strana ){
        if ( $broj_strana <= 0){
            echo "<p>Pogrsan broje strana</p>";

        }else{
            $this-> broj_strana = $broj_strana;
        }

    }
    public function set_cena( $cena ){
        if ( $cena <= 0){
            echo "<p>Pogrsana cena.</p>";

        }else{
            $this-> cena = $cena;
        }

    }
    //geteri
    public function get_naslov(){
        return $this-> naslov;

    }
    public function get_autor(){
        return $this-> autor;

    }
    
    public function get_god_izdanja(){
        return $this-> god_izdanja;

    }
    public function get_broj_strana(){
        return $this-> broj_strana;
    }
    public function get_cena(){
        return $this-> cena;
    }

    public function stampaj(){
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>Naslov: </th><th>".$this->get_naslov()."</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Autor </td><td>".$this->get_autor()."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Godina izdanja: </td><td>".$this->get_god_izdanja()."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Cena: </td><td>".$this->get_cena()."</td>";
            echo "</tr>";
        echo "</table>";
    }

    public function obimna(){
        return ( $this -> get_broj_strana() > 600 );
    }
    public function skupa(){
        return ( $this -> get_cena() > 8000 );
    }
    public function dugacko_ime(){
        $autor_1 = $this->get_autor();
        // mb_strlen( $string," UTF-8") - za nasa slova;
        $autor = str_replace($autor_1, " ", "");
        if( strlen( $autor ) > 18 ){
            echo "<p>$autor_1 ima dugacko ime i prezime</p>";
        }else{
            echo "<p>$autor_1 nema dugacko ime i prezime</p>";

        }
    }

}
$knjige
?>