<?php
// ZADATAK 1. (NIZOVI BROJEVA)
// Dat je niz celih brojeva u kojima se čuvaju ocene jednog studenta koje je dobio polagajući različite ispite.
// Kreirati niz po uslovima zadatka od barem pet elemenata.
// Za sve funkcije iz ovog zadatka, kao parametar se prenosi niz ocena.
// Napisati funkciju koja vraća prosečnu ocenu studenta.
// Napisati funkciju koja vraća maksimalnu ocenu koju je student dobio u toku studija.
// Napisati funkciju koja vraća broj predmeta na kojima je dobio maksimalnu ocenu u toku studija.
// Student je kandidat za studenta generacije ako je na ispitima dobijao samo devetke i desetke, i pri tome broj desetki nije manji od broja devetki. Napisati funkciju koja vraća da li je student kandidat za studenta generacije ili ne.
// Napisati funkciju koja vraća maksimalnu dužinu podniza u kojoj je dobijao maksimalnu ocenu (ova dužina može biti jednaka 1). 
// Na primer, za niz [10, 10, 9, 10, 10, 10, 8, 9, 9, 9, 9, 10, 10, 10], funckija treba da vrati 3.
// Na primer, za niz [6, 8, 6, 6, 6, 7, 7, 9, 7, 7, 7, 7], funkcija treba da vrati 1.

// $ocene = [8,7,9,6,7,7,9,9,9,9,5];
$ocene = [9,9,9,9,9,10,10,10,10,10,10];


function prosecna_ocena ($niz){
    $br = 0;
    $zbir_ocena = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        $zbir_ocena+=$niz[$i];
        $br++;
    }
    return ( $zbir_ocena / $br);
}
echo "<p>Prosecna ocen studenta je ".prosecna_ocena( $ocene )."</p>";
// Napisati funkciju koja vraća maksimalnu ocenu koju je student dobio u toku studija.

function maksimalna_ocena ($niz){
    $max = $niz[0];
    for ( $i = 1; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] > $max ){
            $max = $niz[$i];
        }
    }
    return $max;
}

echo "<p>Maksimalna ocena studenta je ". maksimalna_ocena( $ocene )."</p>";

// Napisati funkciju koja vraća broj predmeta na kojima je dobio maksimalnu ocenu u toku studija.

function broj_maks_ocena ($niz){
    $max = maksimalna_ocena ($niz);
    $br = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] == $max ){
            $br++;
        }
    }
    return $br;
}
echo "<p>Broj predmeta na kojima student ima max ocenu je  ". broj_maks_ocena( $ocene )."</p>";

// Student je kandidat za studenta generacije ako je na ispitima dobijao samo devetke i desetke, i pri tome broj desetki nije manji od broja devetki. Napisati funkciju koja vraća da li je student kandidat za studenta generacije ili ne.

function kandidat ($niz){
    $devetke = 0;
    $desetke = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] > 8){
            if ( $niz[$i] == 9 ){
                $devetke++;
            }else{
                $desetke++;
            }
        }else{
            return false;
        }
    }
    return ( $desetke >= $devetke );
    // return !( $desetke < $devetke );

}
if ( kandidat($ocene) ){
    echo "<P>Student je kandidat za studenta generacije.</p>";
}else{
    echo "<P>Student nije kandidat za studenta generacije.</p>";

}

// Napisati funkciju koja vraća maksimalnu dužinu podniza u kojoj je dobijao maksimalnu ocenu (ova dužina može biti jednaka 1).

function max_ocene_najduzi_niz( $niz ){
    $max_ocena = maksimalna_ocena ($niz);
    $najduzi_niz = 0;
    $br = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        if ( $niz[$i] == $max_ocena ){
            $br++;
            if ( $br > $najduzi_niz ){
                $najduzi_niz = $br;
            }
        }else{
            $br = 0;
        }
    }
    return $najduzi_niz;
}

echo "<p> najduzi niz makcimalnih ocena je " .max_ocene_najduzi_niz( $ocene )."</p>";

// ZADATAK 2. (NIZOVI ASOCIJATIVNIH NIZOVA)
// Za nekog studenta pamtimo informacije o ispitima koje je položio na nekom fakultetu. Za svaki ispit pamtimo sledeće informacije:
// naziv ispita (string),
// datum polaganja (string u formatu YYYY/MM/DD),
// ocena (ceo broj između 6 i 10).
// Za studenta pamtimo niz čiji elementi sadrže date informacije.
// Kreirati niz po uslovima zadatka od barem pet elemenata.
// Napisati sve funkcije iz Zadatka 1 i za ovaj zadatak.
// Takođe, napisati i sledeće funkcije, za koje se kao parametar prenosi niz položenih ispita.
// Napisati funkciju kojoj se prosleđuje i godina kao dodatni parametar, a koja ispisuje predmete koje je polagao date godine.
// Napisati funkciju kojoj se prosleđuje i godina kao dodatni parametar, a koja vraća prosečnu ocenu studenta na ispitima koje je polagao date godine. 
// Napisati funkciju koja vraća naziv predmeta na kojem je student dobio maksimalnu ocenu. Ukoliko ima više ovakvih predmeta, vratiti onaj koji je najskorije položio.
// Napisati funkciju kojoj se prosleđuje i neki string kao dodatni parametar, kao i dva cela broja, a koja vraća broj ispita koje je student položio, a čiji naziv predmeta sadrži dati string, kao i da se ocena nalazi između zadata dva broja.

// Komentar za Zadatak 2: Iako sada možemo da odgovorimo na više pitanja, i dalje imamo neke probleme:
// Kako da se osiguramo da za svaki element niza pamtimo iste informacije (da svi imaju isti broj ključeva, i da se uniformno preslikavaju nazivi ključeva na sve elemente)? 
// Kako da se osiguramo da se ključevi za sve elemente zovu isto (da ne bude ključ kod jednog elementa “naziv”, a kod drugog na primer “nazvi”)?
// Kako da funkcionalnosti koje se tiču samo jednog elementa niza, a ne celog niza, lako implementiraju za sam element, a ne za sam niz (na primer, da naziv predmeta sadrži neki string, da je ocena predmeta veća ili manja od nekog broja, …)

echo "<p>***ZADATAK 2***</p>";
// naziv ispita (string),
// datum polaganja (string u formatu YYYY/MM/DD),
// ocena (ceo broj između 6 i 10).
$student = [
    ["naziv_ispita"=>"Matematika", "datum_polaganja"=>"2021/05/17", "ocena"=> 7],
    ["naziv_ispita"=>"Racunovodstvo", "datum_polaganja"=>"2023/01/09", "ocena"=> 9],
    ["naziv_ispita"=>"Kulturno nasledje", "datum_polaganja"=>"2023/05/09", "ocena"=> 8],
    ["naziv_ispita"=>"Ekonomika", "datum_polaganja"=>"2023/06/18", "ocena"=> 10],
    ["naziv_ispita"=>"Ekonomija", "datum_polaganja"=>"2023/06/22", "ocena"=> 10],
    ["naziv_ispita"=>"Statistika", "datum_polaganja"=>"2022/06/25", "ocena"=> 10]
];
// Napisati funkciju koja vraća prosečnu ocenu studenta.

function prosecna_ocena_2( $niz ){
    $br = 0;
    $zbir = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        $zbir += $niz[$i]["ocena"];
        $br++;
    }
    return $zbir/$br;
}
echo "<p>Prosecna ocen studenta je ".prosecna_ocena_2( $student )."</p>";

// Napisati funkciju koja vraća maksimalnu ocenu koju je student dobio u toku studija.

function max_ocena_2( $niz ){
    $max = $niz[0]["ocena"];
    for ( $i = 1; $i < count ( $niz ); $i++ ){
        if ( $niz[$i]["ocena"] > $max ){
            $max =$niz[$i]["ocena"];
        }
    }
    return $max;
}
echo "<p>Maksimalna ocena studenta je ". max_ocena_2( $student )."</p>";

// Napisati funkciju koja vraća broj predmeta na kojima je dobio maksimalnu ocenu u toku studija.

function broj_maks_ocena_2( $niz ){
    $max =max_ocena_2( $niz );
    $br =0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        if ( $niz[$i]["ocena"] == $max ){
            $br++;
        }
    }
    return $br;
}

echo "<p>Broj predmeta na kojima student ima max ocenu je  ". broj_maks_ocena_2( $student )."</p>";

//**domaci */
// Student je kandidat za studenta generacije ako je na ispitima dobijao samo devetke i desetke, i pri tome broj desetki nije manji od broja devetki. Napisati funkciju koja vraća da li je student kandidat za studenta generacije ili ne.

function student_generacije( $niz ){
    $desetke = 0;
    $desetke = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        if ( $niz[0]['ocena'] > 8 ){
            if ( $niz[0]['ocena'] == 9 ){
                $devetke++;
            }
            if ( $niz[0]['ocena'] == 10 ){
                $desetke++;
            }
        }else{
            return false;
        }
    }
    return ($desetke > $devetke);
}

if ( student_generacije( $student)){
    echo "<p>Student je kandidat za studenta generacije.</p>";
}else{
    echo "<p>Student nije kandidat za studenta generacije.</p>";
}
//**domaci */
// Napisati funkciju koja vraća maksimalnu dužinu podniza u kojoj je dobijao maksimalnu ocenu (ova dužina može biti jednaka 1).

// Napisati funkciju kojoj se prosleđuje i godina kao dodatni parametar, a koja ispisuje predmete koje je polagao date godine.

function polagani_date_godine($niz,$godina){
    for ( $i = 0; $i < count ( $niz ); $i++ ){
    $godina_polaganja = (int)substr( $niz[$i]["datum_polaganja"],0,4);
        if ( $godina_polaganja == $godina ){
            echo "<p>".$niz[$i]['naziv_ispita']."</p>";
        }
    }
}
$godina = 2023; 

echo "<p>Ispiti polagani godine $godina su:</p>";
polagani_date_godine($student,$godina);

// Napisati funkciju kojoj se prosleđuje i godina kao dodatni parametar, a koja vraća prosečnu ocenu studenta na ispitima koje je polagao date godine. 
function prosecna_oc_date_godine($niz,$godina){
    $br = 0;
    $sum = 0;
    for ( $i = 0; $i < count ( $niz ); $i++ ){
        $godina_polaganja = (int)substr( $niz[$i]["datum_polaganja"],0,4);
        if ( $godina_polaganja == $godina ){
            $sum += $niz[$i]["ocena"];
            $br++;
        }
    }
    return ( $sum / $br);
}
echo "<p>Prosecna ocena studenta godine $godina je ".prosecna_oc_date_godine($student,$godina)."</p>";

// Napisati funkciju koja vraća naziv predmeta na kojem je student dobio maksimalnu ocenu. Ukoliko ima više ovakvih predmeta, vratiti onaj koji je najskorije položio.

function max_ocena_predmet( $niz ){
    $max_ocena =  $niz[0]["ocena"];
    $max_predmet = $niz[0]["naziv_ispita"];
    for ( $i = 1; $i < count ( $niz ); $i++ ){
        $datum_polaganja = strtotime($niz[$i]["datum_polaganja"]);
        if ( $niz[$i]["ocena"] > $max_ocena ){
            $max_ocena = $niz[$i]["ocena"];
            $datum_polaganja_max = $datum_polaganja;
            $max_predmet = $niz[$i]["naziv_ispita"];
        }elseif( $niz[$i]["ocena"] ==  $max_ocena ){
            if ( $datum_polaganja > $datum_polaganja_max ){
                $max_ocena = $niz[$i]["ocena"];
                $max_predmet = $niz[$i]["naziv_ispita"];
                $datum_polaganja_max = $datum_polaganja;
            }
        }
    }
    return $max_predmet;
}


echo max_ocena_predmet( $student );



?>