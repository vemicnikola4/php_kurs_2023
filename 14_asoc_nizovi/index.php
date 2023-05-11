<?php
$age = [ "Petar"=>35,"Nikola"=>28,"Milos"=>17,"Marijana"=>12 ];

echo $age['Nikola'];
echo "<br>";

foreach ( $age as $key => $val ){//$key index a val vrednost.Za svaki el niza $god uhvati mi kljuc $key i vrednost $val. Za svaki element niza pozovi ovaj blok naredbi. Vrti mi ovu petlju sve dok $age ima vrednosti ili kljuc. Nema uslova. => Ovo je strelica.
    echo $key ." - ". $val ."<br>";
}

// foreach ( $age as $i ) moze i bez vrednosti 
//prodji redom kroz sve elemente niza.
//dobar je i kad nisu svi indexi redom nego ima rupa
//ide za sve elemente niza i za svaki el izvrsi ovaj blognaredbi.
foreach ( $age as $val ){
    echo $val . "<br>";
}
$age_i = [21,58,47,13,87];
$age_i[100]= 100;
foreach ( $age_i as $key => $val ){//mozemo da ga koristimo i za indexiran array
    echo $key ." => ". $val . " , ";
}
echo "<p>***VEZBANJ***</p>";
echo "<p>***zad 1.***</p>";
// Dat je niz elemenata u obliku MarkaAuta/Godište.
// Ispisati sve automobile, kao i njihova godišta.
// Ispisati automobile koji su stariji od 10 godina.
// Ispisati automobile čija Marka sarži string “Opel”, a proizvedena su posle 2000. godine.

$automobili = ["audi a3" => 2004 ,"Opel Corsa" => 2006 , "Seat Toledo" => 2016 , "Ford Focus" => 2011];

foreach ( $automobili as $key => $val ){
    echo "<p>Automobil $key godiste $val.</p>";
}

foreach ( $automobili as $key => $val ){
    if ( date('Y') - $val > 10 ){
        echo "<p>Automobil $key je stariji od 10 god. Godiste ovog automobila je $val.</p>";
    }
}
foreach ( $automobili as $key => $val ){
    // if ( strpos($key,"Opel") !== false && $val > 2000 ){
    //     echo "<p>Automobil $key godiste $val.</p>";
    // }
    if ( str_contains($key,"Opel") && $val > 2000 ){
        echo "<p>Automobil $key godiste $val.</p>";
    }
}
echo "<p>***zad 2.***</p>";
// Dat je niz elemenata u obliku ImeOsobe/Visina.
// Ispisati sve osobe sa njihovim visinama.
// Ispisati sve natprosečno visoke osobe.
// Ispisati sve osobe koje imaju maksimalnu visinu.
// Ispisati sve osobe sa visinom ispod proseka, a čije ime počinje na slovo 'V'.

$osobe = [ 'Mile' => 185 , 'Lazar' => 190 , 'Nikolina' => 168 , 'Mila' => 172 ,  'Vladimir' => 176 , 'Goran' => 190, 'Vanja' => 165 ];
foreach ( $osobe as $key => $val ){
    echo "<p> $key - $val cm</p>";
}

// Ispisati sve natprosečno visoke osobe.

$zbir_visina = 0;
$broj_osoba = 0;
foreach ( $osobe as  $val ){
    $zbir_visina += $val;
    $broj_osoba++;
}
$prosecna_visina = $zbir_visina/ $broj_osoba;
// $prosecna_visina = $zbir_visina/ count( $osobe );moze i sa count;
echo "<p>Prosecna visina ove grupe osoba je $prosecna_visina</p>";
foreach ( $osobe as $key => $val ){
    if ( $val > $prosecna_visina ){
        echo "<p> $key je natprosecno visok njegova/njena visina je $val .</p>";
    }
}
// Ispisati sve osobe koje imaju maksimalnu visinu.
$naj_visina = 0;
//$naj_visina = PHP_INT_MIN; najmanje podrzan intiger(najmanja moguca vrednost koju ceo broj moze da uzme u php-u);
foreach ( $osobe as $val ){
    if ( $val > $naj_visina ){
        $naj_visina = $val;
    }
}
echo "<p>Najvisa visina u grupi je $naj_visina</p>";
foreach ( $osobe as $key => $val ){
    if ( $val ==  $naj_visina ){
        echo "<p>Visina $key odgovara maksimalnoj visini ove grupe. </p>";
    }
}
// Ispisati sve osobe sa visinom ispod proseka, a čije ime počinje na slovo 'V'.
foreach ( $osobe as $key => $val ){
    if ( $val <  $prosecna_visina && $key[0] == "V" ){
        echo "<p>Visina $key  $val je ispod proseka a njegovo/njeno ime pocinje sa V. </p>";
    }
}
// str_starts_with(string $haystack, string $needle): bool
echo "<p>***zad 3.***</p>";
// Dat je niz elemenata u obliku NazivPredmeta/Ocena koju student ima.
// Ispisati sve predmete i ocene studenta.
// Odrediti najveću ocenu studenta koju ima, i ispisati predmete na kojima je dobio najveću ocenu.
// Odrediti prosečnu ocenu studenta i ispisati predmete na kojima je dobio ocenu veću od prosečne.

$ocene_studenta = ['matematika' => 4,'srpski' => 5,'likovno' => 5,'fizika' => 4,'likovno' => 5,'istorija' => 5,'geografija' => 3,'hemija' => 2 ];

$max_ocena = 0;
$zbir_ocena = 0;
$broj_predmeta = 0;
foreach ( $ocene_studenta as $key => $val ){
    echo "<p>Predmet: $key  $val</p>";
    if ( $val > $max_ocena ){
        $max_ocena = $val;
    }
    $zbir_ocena += $val;
    $broj_predmeta++;
}
echo "<p>Najvisa ocena ovog ucenika je $max_ocena a predmete iz kojih ima $max_ocena ocenu su:</p>";
foreach ( $ocene_studenta as $key => $val ){
    if ( $val == $max_ocena ){
        echo "<p> $key </p>";
    }
}
// Odrediti prosečnu ocenu studenta i ispisati predmete na kojima je dobio ocenu veću od prosečne.
$prosecna_ocena = $zbir_ocena / $broj_predmeta;
echo "<p>Prosecna ocena je $prosecna_ocena a predmeti iz kojih ucenik ima ocenu vecu od prosecne su </p>";
foreach ( $ocene_studenta as $key => $val ){
    if ( $val > $prosecna_ocena ){
        echo "<p>Predmet: $key $val</p>";
    }
}
?>