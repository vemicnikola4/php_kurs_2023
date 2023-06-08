<?php
require_once "class_zaposleni.php";
//Napisati funkciju prosekPlate kojoj se prosleđuje niz zaposlenih, a ona vraća prosečnu platu svih zaposlenih iz niza.

// $osoba = new Osoba ("Milos","Milic",1998);
// $osoba -> ispis();

$zaposleni =[
    ['ime'=>'Damir', 'prezime'=>'Kekec','god_rodjenja'=>1965,'plata'=>63000,'pozicija'=>'Asistent u prodaji'],
    ['ime'=>'Nikola', 'prezime'=>'Martinovic','god_rodjenja'=>1970,'plata'=>70000,'pozicija'=>'Prodaja'],
    ['ime'=>'Kosta', 'prezime'=>'Brka','god_rodjenja'=>1980,'plata'=>59000,'pozicija'=>'Call centar'],
    ['ime'=>'Mile', 'prezime'=>'Ilic','god_rodjenja'=>1990,'plata'=>63000,'pozicija'=>'Call centar'],
    ['ime'=>'Branko', 'prezime'=>'Kojic','god_rodjenja'=>1976,'plata'=>85000,'pozicija'=>'Zamenik direktora'],
    ['ime'=>'Milena', 'prezime'=>'Ilic','god_rodjenja'=>1995,'plata'=>95000,'pozicija'=>'Direktor']
    
];
$sviZaposleniOb = [];


for ( $i = 0; $i < count( $zaposleni );$i++){
    $ime = $zaposleni[$i]['ime'];
    $prezime = $zaposleni[$i]['prezime'];
    $godRodjenja = $zaposleni[$i]['god_rodjenja'];
    $plata = $zaposleni[$i]['plata'];
    $pozicija = $zaposleni[$i]['pozicija'];
    $zaposleniOb = new Zaposleni ($ime, $prezime, $godRodjenja, $plata,$pozicija);
    array_push ( $sviZaposleniOb,$zaposleniOb );
}
$sviZaposleniOb_2 = [];

function prosekPlate( $niz ){
    $sum = 0;
    $br = 0;
    // $niz !== []
    //if ( count( $niz) > 0)
    if ( !empty ( $niz )){
        for ($i = 0; $i < count( $niz );$i++ ){
            $plata = $niz[$i] -> getPlata();
            $sum+= $plata;
            $br++;
        }
        return $sum / $br;
    }else{
        return 0;
    }
    
}

echo "<p>Prosecna plata svih zaposlenih je: ".prosekPlate( $sviZaposleniOb_2 )."<p>";

// Napisati funkciju natprosecnaPlata kojoj se prosleđuje neki zaposleni, a koja vraća true ukoliko zaposleni ima natprosečno visoku platu, a u suprotnom vraća false.

function natprosecnaPlata( $niz, $zaposleni ){
    $prosekSvihPlata = prosekPlate( $niz );
    return ( $zaposleni -> getPlata() > $prosekSvihPlata );
}
echo "<hr>";
if (natprosecnaPlata( $sviZaposleniOb, $sviZaposleniOb[2] )){
    $sviZaposleniOb[2]  -> ispisZaposleni();
    echo "<p>Ima vecu platu od prosecne plate koja iznosi ". prosekPlate( $sviZaposleniOb )."</p>";
}else{
    $sviZaposleniOb[2]  -> ispisZaposleni();
    echo "<p>Nema vecu platu od prosecne plate koja iznosi ". prosekPlate( $sviZaposleniOb )."</p>";

}

?>