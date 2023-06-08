<?php
require_once "class_samofinansirajuci.php";
require_once "class_budzetski.php";
// Kreirati apstraktnu klasu Student koja od zaštićenih polja sadrži:
// $ime (string), 
// $osvojeniESPB (broj ESPB poena koje je osvojio do sada u toku školovanja), 
// $prosecnaOcena (broj). 


// Od javnih metoda sadrži getere, setere, konstruktor, metodu za ispisivanje podataka o studentu, kao i dve apstraktne metode:
// skolarina(), za računanje školarine (bez parametara)
// cenaPrijaveIspita(), za računanje cene prijave ispita (bez parametara).
// $ime, $osvojeniESPB,$prosecnaOcena, $prijavljeniESPB
$s1 = new SamofinansirajuciStudent ("Mile Ilic", 70 , 7.5, 50 );
$s2 = new SamofinansirajuciStudent ("Dunja Matic", 150 , 8, 45 );
$s3 = new SamofinansirajuciStudent ("Luka Dacic", 270 , 6.3, 30 );
$s4 = new SamofinansirajuciStudent ("Pavle Ostojic", 45 , 6.2,50 );
// $ime, $osvojeniESPB, $prosecnaOcnena
$s5 = new BudzetskiStudent ("Maja Stosic" , 150 , 6.5);
$s6 = new BudzetskiStudent ("Marija Uskokovic" , 230, 6.5);
$s7 = new BudzetskiStudent ("Luka Milic" , 45 , 8.3);
$s8 = new BudzetskiStudent ("Petra Pasic" , 280 , 7.45);
$s9 = new SamofinansirajuciStudent ("Milica Pavlovic", 70 , 6.2, 50 );

$nizStudenti = [
    $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8,$s9
];


function ispisStudenata( $niz ){
    echo "<table border=1>";
    echo "<tr><th>Student</th><th>Status studenta</th><th>Broj ESPB bodova</th><th>Prosecna Ocena</th><th>Cena prijave ispita</th><th>Cena Skolarine</th><th>Prijavljeni ESPB bodovi</th></tr>";
    foreach ( $niz as $student ){
        $student -> ispis();
    }
    echo "</table>";
}
ispisStudenata( $nizStudenti );






















// Kreirati klasu SamofinansirajuciStudent koja nasleđuje klasu Student, ima zaštićeno polje $prijavljeniESPB (broj ESPB bodova koje je prijavio da sluša u narednoj školskoj godini, ne može biti manji od 35, veći od 60, i zbir osnovijenih i pirjavljenih bodova ne može biti veći od 300), a koja računa visinu školarine po fomuli: Ako je prosečna ocena manja od 8, onda je školarina 1900 * prijavljeniESPB, u suprotnom je 1600 * prijavljeniESPB. Cena prijave ispita je 400 din.

// osvojeno:280 prijavljeno: 20 => Moguće
// osvojeno:280 prijavljeno: 35 => Nije moguće
// osvojeno:280 prijavljeno: 15 => Nije moguće
// osvojeno:200 prijavljeno: 20 => Nije moguće
// osvojeno:200 prijavljeno: 70 => Nije moguće
// osvojeno:200 prijavljeno: 35 => Moguće
// osvojeno:200 prijavljeno: 60 => Moguće
// osvojeno:265 prijavljeno: 35 => Moguće
// osvojeno:240 prijavljeno: 60 => Moguće



// Kreirati klasu BudzetskiStudent koja nasleđuje klasu Student. Visinina školarine jednaka je (300 - osvojeniESPB) * 2000. A cena prijave ispita je 100 din ukoliko student nije očistio prethodne godine, ako jeste onda je cena 0 dinara. Student je očistio jednu godinu studija ako je osvojio 60 ESPB poena.


// Kreirati niz od barem četiri studenta. 


// Odrediti studenta koji plaća najveću školarinu. 

function maxSkolarina($niz){
    $maxSkolarina = $niz[0]-> skolarina();
    $maxStudent =  $niz[0];
    foreach ( $niz as $student ){
        if ( $student-> skolarina() > $maxSkolarina ){
            $maxSkolarina = $student-> skolarina();
            $maxStudent = $student;
        }
    }
    return $maxStudent;
}
$maxSkolarinaStudent = [];
$maxSkolarinaStudent[0]=  maxSkolarina($nizStudenti);
echo "<p>Najvecu skolarinu placa:</p>";
ispisStudenata( $maxSkolarinaStudent );
// Odrediti prosečnu školarinu svih studenata.

function prosecnaSkolarina( $niz ){
    $sum= 0;
    $br = 0;
    foreach ( $niz as $student ){
        $sum+= $student-> skolarina();
        $br++;
    }
    if ( $br > 0 ){
        return $sum/$br;
    }else{
        return 0;
    }
}
echo "<p>Prosecna skolarina svih studenata je:</p>";
echo  prosecnaSkolarina( $nizStudenti );


// Odrediti prosečan odnos visine školarine i broja osvojenih ESPB bodova.


// Odrediti studenta sa minimalnim brojem osvojenih ESPB. Ako ima više takvih studenata, vratiti onog koji plaća najveću školarinu (ako ima i više takvih, vratiti bilo kog).

function minOsvojenihESPB($niz){
    $minStudent = $niz[0];
    $minESPB = $niz[0]-> getOsvojeniESPB();
    $skolarina =  $niz[0]-> skolarina();
    foreach ( $niz as $student ){
        if ( $student ->getOsvojeniESPB() <  $minESPB ){
            $minESPB = $student ->getOsvojeniESPB();
            $minStudent = $student;
            $skolarina = $student -> skolarina();

        }
    }
}









?>