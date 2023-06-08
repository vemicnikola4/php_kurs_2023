<?php
// U klasi Film, dodati tri metode za postavljanje polja, tako da se u metodi za postavljanje godine izdanja proverava da li je godina veća od 1800.
class Film{
    private $naslov;
    private $reziser;
    private $godina_izdanja;

    function stampaj(){
        echo "<table>";
            echo "<tr>";
                echo "<td>".$this->naslov."</p>";
                echo "<td>".$this->reziser."</p>";
                echo "<td>".$this->godina_izdanja."</p>";
            echo "</tr>";
        
        echo "</table>";
    }
    public function set_naslov($naslov){
        if ( $naslov !== ""){
            $this->naslov = $naslov;
        }else{
            $this->naslov = "Nepoznat naslov";

        }
    }

    public function set_reziser($reziser){
        if ( $reziser !== ""){
            $this->reziser = $reziser;
        }else{
            $this->reziser = "Nepoznat reziser";

        }
    }
    public function set_godina_izdanja($godina_izdanja){
        if ( $godina_izdanja > 1800 ){
            $this->godina_izdanja = $godina_izdanja;
        }else{
            $this->godina_izdanja = 1800;

        }
    }
    public function get_naslov(){
        return $this-> naslov;
    }
    public function get_reziser(){
        return $this-> reziser;
    }
    public function get_godina_izdanja(){
        return $this-> godina_izdanja;
    }
}
$f_1 = new Film();
$f_1 ->set_naslov("Krvavi Dijamant");
$f_1 ->set_reziser("");
$f_1 ->set_godina_izdanja(1760);
$f_1 -> stampaj();
?>