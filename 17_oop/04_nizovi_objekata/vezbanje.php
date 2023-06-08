<?php
//Da ukljucimo drugi file postoje 4 opcije
//Zajednicko je da onesadrzaj jednog fajla nalepe na to mesto
//include "film.php"; kaze ako ne postoji file samo ignorise, pokusaj da stavis ovaj file ako postoji. Prikazuje gresku ali NASTAVLJA IZVRSENJE PROGRAMA. WARNING

//include_once "film.php"; isto kao gore , ali ako je ovaj file vec ukljucen ranije onda ga ne ukljucuj ponovo U Realnim projekti postoje stotine fajlova pa se moze desiti da vise puta pozivamo neki file . Prikazuje gresku ali NASTAVLJA IZVRSENJE PROGRAMA. WARNING.

//require "film.php"; isto kao include  ali ako ne postoji file prijavljuje gresku Prikazuje error i PREKIDA PROGRAM ako .

//require_once "film.php"; isto kao require ali ako je vec ukljucen onda ga ne ukljucuj ponovo PREKIDA PROGRAM.

//ako pozivamo file1 i file2 a file2 je vec pozvan u file1 izbacice nam gresku. Zato se radi require_once.
require "film.php";
$f1 = new Film("Lord of the Rings","Peter Jeckson",2001,[1,2,3,4,5]);
$f1 -> stampaj();

$f2 = new Film("Kill Bill","Quentin Tarantino",2003,[3,5,8,7]);
$f2 -> stampaj();


$f3 = new Film("Titanik","James Cameron ",1999,[4,8,8,7,7]);
$f3 -> stampaj();
echo "<hr>";
//prednost kod nizova objekata je ta sto osigurava da svaki element niza ima iste kljuceva,
// dok kod niza koji sadrze asoc nizove kao elemente mozese desiti da se kljucevi razlikuju. Npr pogresimo u unosu.
$filmovi = [$f1,$f2,$f3];
foreach ( $filmovi as $film ){
    $film -> stampaj();
}

function prosecnaOcena($niz){
    $sum = 0;
    foreach ( $niz as $val ){
        $sum += $val -> prosek();
    }
    $n =  count($niz);
    return ($n > 0) ? ($sum / $n ) : 0;
    // return $sum / count($niz);
}

echo "<p> Prosecna ocena svih filmova je: ".prosecnaOcena($filmovi)."</p>";

function vekFilmova( $niz, $vek ){
    foreach ( $niz as $val ){
        $godIzdanja = $val -> getGodIzdanja();
        $vekIzdanja = ceil( $godIzdanja / 100 );
        if ( $vekIzdanja == $vek ){
            $val -> stampaj();
        }

    }
}

echo "<hr>";
echo "<p> Filmovi koji su izsli u 21 veku su:</p>";
vekFilmova( $filmovi, 21 );
echo "<hr>";
echo "<p> Filmovi koji su izsli u 20 veku su:</p>";
vekFilmova( $filmovi, 20 );

//funkcija osrednji film najblizi prosecoj oceni

function osrednjiFilm($niz){
    $prosek = prosecnaOcena($niz);
    $najblizaVrednost = abs($niz[0]->prosek()- $prosek );
    $najbliziFilm = $niz[0];
    foreach ( $niz as $film ){
        $vrednost =  abs($film ->prosek()- $prosek );
        if ( $vrednost < $najblizaVrednost ){
            $najblizaVrednost = $vrednost;
            $najbliziFilm = $film;
        }
    }
    return $najbliziFilm;

}
echo "<hr>";

$osf = osrednjiFilm($filmovi);
echo "<p>Film najblizi proseku je<p>";
$osf -> stampaj();
echo "<hr>";

// Napraviti funkciju najboljeOcenjeni kojoj se prosleđuje niz filmova, a ona vraća najbolje ocenjeni film.

function najboljeOcenjeni( $niz ){
    $max = $niz[0] -> prosek();
    $najboljeOcenjeni = $niz[0];
    foreach ( $niz as $film ){
        $ocena = $film -> prosek();
        if ( $ocena > $max ){
            $max = $ocena;
            $najboljeOcenjeni = $film;
        }
    }
    return $najboljeOcenjeni;
}
echo "<p>Najbolje ocenjeni film je<p>";
$najFilm = najboljeOcenjeni( $filmovi );
$najFilm -> stampaj();

// Napraviti funkciju najmanjaOcenaNajboljeg kojoj se prosleđuje niz filmova a ona određuje najbolji film i ispisuje njegovu najslabiju ocenu.

function najmanjaOcenaNajboljeg( $niz ){
    $najboljiFilm = najboljeOcenjeni( $niz );
    $oceneFilma = $najboljiFilm -> getOcene();
    $min = $oceneFilma[0];
    foreach ( $oceneFilma as $ocena ){
        if ( $ocena < $min ){
            $min = $ocena;
        }
    }
    return $min;
}

echo "<hr>";
$minOcena =najmanjaOcenaNajboljeg( $filmovi);

echo "<p>Najmanja ocena najboljeg filma je $minOcena<p>";
echo "<hr>";

// Napisati funkciju najmanjaOcena kojoj se prosleđuje niz filmova, a koja vraća koja je najmanja ocena koju je bilo koji film dobio.
function najmanjaOcena ( $niz ){
    $ocenaPrvogFilma = $niz[0] -> getOcene();
    $minOcena = $ocenaPrvogFilma[0];
    foreach ( $niz as $film ){
        $ocene = $film -> getOcene();
        foreach ( $ocene as $o ){
            if ( $o < $minOcena ){
                $minOcena = $o;
            }
        }
    }
    return $minOcena;
}
$mo = najmanjaOcena ( $filmovi );

echo "<p>Najmanja ocena koju je neki film dobio je $mo<p>";
echo "<hr>";
//slide 36 domaci
// Napisati funkciju najcescaOcena kojoj se prosleđuje niz filmova, a ona vraća ocenu koju su filmovi najčešće dobijali.

function najcescaOcena($niz){
    $brPonavljanja = 0;
    $sveOcene = [];
    $maxPonavljanja = 0;
    $najcescaOcena = $niz[0]->getOcene();
    $najcescaOcena = $najcescaOcena[0];
    for ( $k = 0 ; $k < count( $niz ); $k++ ){
        //dohvata niz ocena za svaki film
        $ocenePrviLoop = $niz[$k]->getOcene();
        for ( $s = 0 ; $s < count(   $ocenePrviLoop  ); $s++ ){
            //ide kroz niz ocene prvi film drugi film ...
            $ocenaPrviLoop = $ocenePrviLoop[$s];
            for ( $i = 0 ; $i < count( $niz ); $i++ ){
                //otvara novu petlju u opet dohvata sve filmove i sve nizove ocena za svaki film
                $ocene = $niz[$i]->getOcene();
                //ide kroz taj niz i proverava koliko se ocena iz loopa 2 nivoa iznad javlja u svakom nizu ocena u svakom filmu.
                for ( $j = 0 ; $j < count(  $ocene ); $j++ ){
                    if ($ocene[$j] == $ocenaPrviLoop){
                        $brPonavljanja++;
                        //ako stavim znak vece vraca prvu ocenu u slucaju da se sve pojavljuju jednom ako stavim >= vraca poslednju ili da imaju isti broj ponavljanja.
                        if ( $brPonavljanja >= $maxPonavljanja ){
                            $maxPonavljanja = $brPonavljanja;
                            $najcescaOcena = $ocenaPrviLoop;
                        }
                    }
                }
            }
            $brPonavljanja = 0;   
        }
    }
    return $najcescaOcena;
}

// najcescaOcena($filmovi);
 $najcescaOcena = najcescaOcena($filmovi) ;
echo "<p>Najcesca ocena koju su dobijali filmovi je ".$najcescaOcena."</p>";

// Napraviti funkciju iznadOcene kojoj se prosleđuje ocena i niz filmova, a ona vraća niz onih filmova koji su bolje ocenjeni od prosleđene ocene.

function iznadOcene( $niz, $ocena ){
    $nizIznadFilmovi = [];
    for ( $i = 0 ; $i < count($niz); $i++ ){
        if ( $niz[$i]->prosek() > $ocena ){
            array_push ( $nizIznadFilmovi, $niz[$i]);
        }
    }
    return $nizIznadFilmovi;
}

echo "<hr>";
$ocena = 20;


$iznadOcFilmovi = iznadOcene( $filmovi, $ocena );
echo "<p>Filmovi cija je prosecna ocena iznad $ocena su: </p>";
if ( $iznadOcFilmovi !== [] ){
    foreach ( $iznadOcFilmovi as $film ){
        $film -> stampaj();
    }
}else{
    echo "<p>Nema filmova cija je prosecna ocena veca od $ocena</p>";
}


// Napisati funkciju iznadOceneNoviji kojoj se prosleđuje ocena i niz filmova  a koja treba da na ekranu da ispiše sve podatke o najnovijem filmu koji zadovoljava prosleđenu ocenu

function iznadOceneNoviji($niz, $ocena ){
    $filmoviIznadOcene = iznadOcene( $niz, $ocena );
    if ( $filmoviIznadOcene !== [] ){
        $najnoviji = $filmoviIznadOcene[0];
        foreach ( $filmoviIznadOcene as $film ){
            if ( $film->getGodIzdanja() > $najnoviji->getGodIzdanja()){
                $najnoviji = $film;
            }
        }
        return $najnoviji;
    }else{
        return NULL;
    }
    
}
echo "<hr>";

$najnovijiIznadOcene = iznadOceneNoviji($filmovi, $ocena );
echo "<P>Najnoviji film iznad ocene $ocena je: </p>";
if ( $najnovijiIznadOcene !== NULL ){
    $najnovijiIznadOcene->stampaj();
}else{
    echo "<p>Nema filmova cija je prosecna ocena veca od $ocena</p>";
}
?>