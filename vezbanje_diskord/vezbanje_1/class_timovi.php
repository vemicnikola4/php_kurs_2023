<?php
// Napisi klasu tim koja ima atribute 
// Naziv
// Broj pobeda
// Broj poraza
// Broj Neresenih
// Naoraviti setere i get_required_files
// Napraviti konstructor
// Napraviti  fc ispis koja ispisu je sve info o timu.
// Napraviti niz timova.

class Tim {
    private $naziv;
    private $brPobeda;
    private $brPoraza;
    private $brNeresenih;
    private $brDatihGolova;
    private $brPrimljeihGolova;

    public Function __construct( $naziv,$brPobeda,$brPoraza,$brNeresenih, $brDatihGolova,$brPrimljenihGolova ){
        $this -> naziv = $naziv;
        $this -> brPobeda = $brPobeda;
        $this -> brPoraza = $brPoraza;
        $this -> brNeresenih = $brNeresenih;
        $this -> brDatihGolova = $brDatihGolova;
        $this -> brPrimljenihGolova = $brPrimljenihGolova;

    }
    public function setNaziv( $naziv ){
        if ( gettype( $naziv ) == "string" && $naziv !== ""){
            $this-> naziv = $naziv;
        }else{
            echo "<p>Error. Naziv must be type string and not empty;</p>";
            exit;
        }
    }
    public function setBrPobeda( $brPobeda ){
        if ( gettype( $brPobeda ) == "intiger" && $brPobeda > -1 ){
            $this-> brPobeda = $brPobeda;
        }else{
            echo "<p>Error. brPobeda must be type string and not empty;</p>";
            exit;
        }
    }
    public function setBrPoraza( $brPoraza ){
        if ( gettype( $brPoraza ) == "intiger" && $brPoraza > -1 ){
            $this-> brPoraza = $brPoraza;
        }else{
            echo "<p>Error. brPoraza must be type string and not empty;</p>";
            exit;
        }
    }
    public function setBrNeresenih( $brNeresenih ){
        if ( gettype( $brNeresenih ) == "intiger" && $brNeresenih > -1 ){
            $this-> brNeresenih = $brNeresenih;
        }else{
            echo "<p>Error. brNeresenih must be type intiger and not empty;</p>";
            exit;
        }
    }
    public function setBrDatihGolova( $brDatihGolova ){
        if ( gettype( $brDatihGolova ) == "intiger" && $brDatihGolova > -1 ){
            $this-> brDatihGolova = $brDatihGolova;
        }else{
            echo "<p>Error. brDatihGolova must be type intiger and not empty;</p>";
            exit;
        }
    }
    public function setBrPrimljenihGolova( $brPrimljenihGolova ){
        if ( gettype( $brPrimljenihGolova ) == "intiger" && $brPrimljenihGolova > -1 ){
            $this-> brPrimljenihGolova = $brPrimljenihGolova;
        }else{
            echo "<p>Error. brPrimljenihGolova must be type intiger and not empty;</p>";
            exit;
        }
    }
    
    public function getNaziv(){
        return $this -> naziv;
    }
    public function getBrPobeda(){
        return $this -> brPobeda;
    }public function getBrPoraza(){
        return $this -> brPoraza;
    }public function getBrNeresenih(){
        return $this -> brNeresenih;
    }
    public function getBrDatihGolova(){
        return $this -> brDatihGolova;
    }
    public function getBrPrimljenihGolova(){
        return $this -> brPrimljenihGolova;
    }
   
    public function brBodova(){
        return ($this->getBrNeresenih() + ($this -> getBrPobeda() * 3));
    }
    public function ukupnoOdigrano(){
        return $this->getBrNeresenih() + $this->getBrPobeda() + $this->getBrPoraza();
    }

    public function ispis(){
        echo "<tr>";
            echo "<th>Klub</th><th>Broj Bodova</th><th>Ukupno Odigrano</th><th>Broj Pobeda</th><th>Broj Poraza</th><th>Broj Neresenih</th><th>Broj Datih Golova</th><th>Broj Primljenih Golova</th>";
        echo "</tr>";
        echo "<tr>
            <td style='font-weight:bolder'>".$this->getNaziv()."</td>
            <td style='font-weight:bolder;color:green'>".$this->brBodova()."</td>
            <td>".$this->ukupnoOdigrano()."</td>
            <td style='font-weight:bolder; color:blue'>".$this->getBrPobeda()."</td>
            <td style='font-weight:bolder; color:red' >".$this->getBrPoraza()."</td>
            <td style='font-weight:bolder; color:brown' >".$this->getBrNeresenih()."</td>
            <td>".$this->getBrDatihGolova()."</td>
            <td>".$this->getBrPrimljenihGolova()."</td>
            
            </tr>";
    }
}
// private $naziv;
//     private $brPobeda;
//     private $brPoraza;
//     private $brNeresenih;
//     private $brDatihGolova;
//     private $brPrimljeihGolova;
//27
$timovi = [
    ["naziv" => "Crvena Zvezda", "br_pobeda" => 12, "br_poraza" => 1 ,"br_neresenih" => 14, "br_primljenih_golova" => 25, "br_datih_golova" => 44],
    ["naziv" => "Partizana", "br_pobeda" => 8, "br_poraza" =>19 ,"br_neresenih" => 0, "br_primljenih_golova" =>12, "br_datih_golova" => 12],
    ["naziv" => "Bezanija", "br_pobeda" => 8, "br_poraza" =>0,"br_neresenih" => 19, "br_primljenih_golova" => 44, "br_datih_golova" =>12],
    ["naziv" => "Vozdovac", "br_pobeda" => 11, "br_poraza" => 9 ,"br_neresenih" => 7, "br_primljenih_golova" =>22, "br_datih_golova" => 32],
    ["naziv" => "Surdulica", "br_pobeda" => 7, "br_poraza" =>18 ,"br_neresenih" => 2, "br_primljenih_golova" => 24, "br_datih_golova" => 7]
];
$timoviOb = [];
for ( $i = 0; $i < count ( $timovi ); $i++ ){
    $naziv = $timovi[$i]['naziv'];
    $brPobeda = $timovi[$i]['br_pobeda'];
    $brPoraza = $timovi[$i]['br_poraza'];
    $brNeresenih = $timovi[$i]['br_neresenih'];
    $brPrimljeihGolova = $timovi[$i]['br_primljenih_golova'];
    $brDatihGolova = $timovi[$i]['br_datih_golova'];
    $timOb = new Tim( $naziv, $brPobeda,$brPoraza,$brNeresenih, $brDatihGolova,$brPrimljeihGolova );
    array_push ( $timoviOb , $timOb );
}

$bodoviNiz = [];

for ( $i = 0; $i < count( $timoviOb ); $i++ ){
    $tim = $timoviOb[$i];
    $bodovi = $tim -> brBodova();
    array_push ( $bodoviNiz, $bodovi);
    // $tim -> ispis();
}
echo "<hr>";

rsort( $bodoviNiz );

echo "<table border=1>";
for ( $i = 0; $i < count( $bodoviNiz ); $i++ ){
    for ($j = 0; $j < count( $timoviOb ); $j++ ){
        $tim = $timoviOb[$j];
        if ( $tim -> brBodova() == $bodoviNiz[$i] ){
            $tim -> ispis();
        }
    }
}
echo "</table>";

?>