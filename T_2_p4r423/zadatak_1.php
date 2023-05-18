<?php
// Napomena: Prilikom izrade testa ne koristiti ugrađene funkcije za izračunavanje sume,
// minimuma, maksimuma, prosečne vrednosti,...
// Možete koristiti funkciju count za određivanje dužine niza.
// Napomena: Funkcije i promenljive nazivati tačno onako kako je naznačeno u tekstu
// zadatka.

// Zadatak 1 (Stabla)
// Dat je niz stabala sa njihovim visinama (visina ne mora nužno biti ceo broj). Na nekoj
// visini od nivoa tla pušta se testera koja prolazi kroz redom kroz sva stabla u nizu.
// ➢ (5 poena) Kreirati niz koji sadrži visine najmanje 5 stabala.
// ➢ (10 poena) Napisati funkciju brojNeposecenihStabala($stabla,
// $testera) kojoj se prosleđuje niz sa visinama stabala, kao i visina na kojoj se
// pušta testera da seče, a koja vraća broj stabala koja nisu sečena prilikom
// prolaska testere.
// ➢ (15 poena) Napisati funkciju ukupnoPoseceno($stabla, $testera) kojoj
// se prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da
// seče, a vraća koliko metara drva je ukupno posečeno.
// ➢ (20 poena) Napisati funkciju maxDuzina($stabla, $testera) kojoj se
// prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da seče,
// a vraća dužinu maksimalnog niza uzastopno posečenih stabala.
// Na primer, ako su visine stabala zadate nizom [8.2, 6.6, 3.0, 4.0, 5.1, 6.6, 13.5,
// 4.0], i ako je visina testere postavljena na 5.0 metara, tada su uzastopni nizovi
// posečenih stabala [8.2, 6.6] i [5.1, 6.6, 13.5], a dužina maksimalnog niza jednaka
// je 3.


// Dat je niz stabala sa njihovim visinama (visina ne mora nužno biti ceo broj). Na nekoj
// visini od nivoa tla pušta se testera koja prolazi kroz redom kroz sva stabla u nizu.
$stabla = [ 10.5,4,4,16,5,7];

// ➢ (10 poena) Napisati funkciju brojNeposecenihStabala($stabla,
// $testera) kojoj se prosleđuje niz sa visinama stabala, kao i visina na kojoj se
// pušta testera da seče, a koja vraća broj stabala koja nisu sečena prilikom
// prolaska testere.4
echo "<p>Visine stabala: </p>";
for ( $i = 0; $i < count ( $stabla ); $i++ ){
    echo $stabla[$i] . " - ";
}
function broj_neposecenih_stabala($stabla, $testera ){
    $br = 0;
    for ( $i = 0; $i < count ( $stabla ); $i++ ){
        if ( $stabla[$i] < $testera ){
            $br++;
        }
    }
    return $br;
}
$testera = 6;
echo "<p>Testera se pusta na visinu $testera m, broj stabla koja nisu posecena je ". broj_neposecenih_stabala($stabla, $testera )."</P>";

//➢ (15 poena) Napisati funkciju ukupnoPoseceno($stabla, $testera) kojoj
// se prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da
// seče, a vraća koliko metara drva je ukupno posečeno.

function ukupno_poseceno($stabla, $testera){
    $ukupno_metara = 0;
    for ( $i = 0; $i < count ( $stabla ); $i++ ){
        if ( $stabla[$i] > $testera ){
            $ukupno_metara += ( $stabla[$i] - $testera );
        }
    }
    return $ukupno_metara;
}

echo "<p>Testera se pusta na visinu $testera m, ukupno je poseceno ". ukupno_poseceno($stabla, $testera) ." metara visine stabala</P>";

// ➢ (20 poena) Napisati funkciju maxDuzina($stabla, $testera) kojoj se
// prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da seče,
// a vraća dužinu maksimalnog niza uzastopno posečenih stabala.
// Na primer, ako su visine stabala zadate nizom [8.2, 6.6, 3.0, 4.0, 5.1, 6.6, 13.5,
// 4.0], i ako je visina testere postavljena na 5.0 metara, tada su uzastopni nizovi
// posečenih stabala [8.2, 6.6] i [5.1, 6.6, 13.5], a dužina maksimalnog niza jednaka
// je 3.

function max_duzina( $stabla, $testera ){
    $najduzi_niz = 0;
    $max_niz = 0;
    for ( $i = 0; $i < count ( $stabla ); $i++ ){
        if ( $stabla[$i] > $testera ){
            $najduzi_niz++;
            if ( $najduzi_niz > $max_niz ){
                $max_niz = $najduzi_niz;
            }
        }else{
            $najduzi_niz = 0;
        }
    }
    return $max_niz;
}

echo "<p>Testera se pusta na visinu $testera m, najduzi niz uzastopno posecenih stabala je ". max_duzina( $stabla, $testera )."</P>";
?>