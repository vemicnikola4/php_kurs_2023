<?php
require_once "class_kosarkas.php";

$s1 = new Kosarkas (  "Mile", "Ilic", 1986, "Cacak",[21,14,16,9]);
$s2 = new Kosarkas (  "Bogdan", "Bogdanovic", 1992, "Beograd",[17,14,21,9,15,61,12]);
$s3 = new Kosarkas (  "Milos", "Teodosic", 1988, "Valjevo",[2,11,26,19,13]);
$s4 = new Kosarkas (  "Luka", "Mitrovic", 1992, "Beograd",[60,19,14,8,3,12,9]);
$s5 = new Kosarkas (  "Vladimir", "Lucic", 1992, "Cacak",[5,7,11]);

$sportisti =[
    $s1,$s2, $s3, $s4, $s5
];
function ispisSportista ( $niz ){
    echo "<table border=1>";
        echo "<tr><th>Ime </th><th>Prezime </th><th>Godina Rodjenja </th><th>Grad Rodjenja </th><th>Broj Poena </th><th>Ukupan Broj Poena </th><th>Prosek Poena </th></tr>";
        foreach ( $niz as $sportista ){
            $sportista -> ispis();
        }
    echo "</table>";
}

ispisSportista ( $sportisti );

// Napisati funkciju najviseUtakmica koja vraća košarkaša koji je odigrao najveći broj utakmica.Ako imaju isti br utakmica vratiti onog sa vise poena.

function najviseUtakmica ( $niz ){
    $najviseUtakmica = count($niz[0] -> getPoeniArray());
    $brojPoena = $niz[0] -> ukupnoPoena();
    $igracNajUt = $niz[0];

    foreach ( $niz as $igrac){
        if ( count($igrac -> getPoeniArray())> $najviseUtakmica ){
            $najviseUtakmica =  count ($igrac -> getPoeniArray());
            $igracNajUt = $igrac;
            $brojPoena = $igrac -> ukupnoPoena();

        }elseif(  count($igrac -> getPoeniArray()) ==  $najviseUtakmica ){
            if ( $igrac->ukupnoPoena() > $brojPoena ){
                $najviseUtakmica =  count ($igrac -> getPoeniArray());
                $igracNajUt = $igrac;
                $brojPoena = $igrac -> ukupnoPoena();
            }
        }
    }
    return $igracNajUt;
}
$igracNajUt = [];
$igracNajUt[0]= najviseUtakmica ( $sportisti);
ECHO "<P>Najvise utakmica je odigrao: </P>";
ispisSportista ( $igracNajUt );

// Napisati funkciju najvisePoena koja vraća košarkaša koji je postigao najveći broj poena na jednoj utakmici.

function najvisePoena ( $niz ){
    $najviseP = $niz[0]->getPoeniArray()[0];
    $najKosarkas = $niz[0];
    foreach ( $niz as $kosarkas ){

        foreach ( $kosarkas->getPoeniArray() as $poeni ){
            if ( $poeni > $najviseP ){
                $najviseP = $poeni;
                $najKosarkas = $kosarkas;
            }
        }
    }
    return $najKosarkas;
}
$najKosarkas = [];
echo "<p>Najvise poena na jednoj utakmici je postigao: </p>";
$najKosarkas[0] =  najvisePoena ( $sportisti );
ispisSportista ( $najKosarkas );

// Napisati funkciju najviseProsecnoPoena koja vraća košarkaša koji je u proseku postigao najveći broj poena po utakmici.

function najviseProsecnoPoena($niz){
    $najveciProsek = $niz[0]-> prosekPoena();
    $najPrKosarkas = $niz[0];
    foreach ( $niz as $kosarkas ){
        if ( $kosarkas -> prosekPoena() > $najveciProsek ){
            $najveciProsek = $kosarkas -> prosekPoena();
            $najPrKosarkas = $kosarkas;
        }
    }
    return $najPrKosarkas;
}
$najPrKosarkas = [];
$najPrKosarkas[0]= najviseProsecnoPoena ( $sportisti );
echo "<p>Najveci prosek poena ima: </p>";
ispisSportista ( $najPrKosarkas );

?>