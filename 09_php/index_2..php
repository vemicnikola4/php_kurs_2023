<?php
    // Zad. 3 Date su dve promenljive $cena i $nov, čije su vrednosti cena neke robe, kao i novčanica kojom kupac plaća robu. Odrediti kusur koji kasirka treba da vrati (pretpostaviti da je $cena < $nov).
    $cena =1400;
    $nov =2000;

    $kusur = $nov - $cena;
    echo "<hr>";
    echo "Kusur je : ".$kusur;
    echo "<hr>";

    // Data je promenljiva $eur čija je vrednost iznos u eurima koji klijent ima kod sebe. Odrediti iznos u dinarima koji klijent dobija prilikom konverzije. Koristiti srednji kurs eura.
    $eur = 100;//hardkodujemo promenjivu dajemo joj rucno vred
    $srednji_kurs = 117.51;
    $din = $eur * $srednji_kurs;
    echo "<hr>";
    echo "Trenutno imam: ". number_format($din,2,",",".")  . " din.";
    echo "<hr>";
    // zad 5. Data je promenljiva $din čija je vrednost iznos u dinarima koji klijent ima kod sebe. Odrediti iznos u eurima koji klijent dobija prilikom konverzije. Koristiti srednji kurs eura.
    $din = 5558;
    $srednji_kurs = 117.51;
    $eur = $din / $srednji_kurs;
    echo "<hr>";
    echo "Trenutno imam: ". number_format($eur,2,",",".")  . " eur, nakon konverzije.";
    echo "<hr>";
    //zad 6. Data je promenljiva $eur čija je vrednost iznos u eurima koji klijent ima kod sebe. Odrediti iznos u dolarima koji klijent dobija prilikom konverzije, ako je poznat srednji kurs eura prema dinaru, kao i srednji kurs dolara prema dinaru. 
    $eur = 100;
    $kurs_eur_din = 117.5;
    $kurs_dol_din = 106.7;
    $dol = $eur * $kurs_eur_din/$kurs_dol_din;//kada je visina ista ide redosledom kojim je napisano.
    echo "<hr>";
    echo "Konvertovanih 100e iznosi: ". number_format($dol,2,",",".")  . " dol.";
    echo "<hr>";

    // zad 10.Date su promenljive $cena i $popust, u kojoj su zadate cena neke robe sa zadatim popustom (vrednost promenljive $popust je između 0 i 100). Odrediti kolika je cena robe bez popusta.

    $cena_sa_popustom = 80;
    $popust = 15;
    $cena = $cena_sa_popustom;
    echo $cena;
    
    // zad 11. Mirko je u apoteci kupio lek u bočici koja sadrži $n tableta, pri čemu je $n >= 3. Od lekara je dobio uputstvo da taj lek treba da pije po jednu tabletu tri puta dnevno, sve dok ima tableta za ceo dan. Odrediti koliko dana Mirko treba da pije lek, kao i koliko tableta ostaje nesikorišćeno u toku terapije.
    //bocica : 3 ,1 dan 0 neiskorisceno
    //bocica : 4 ,1 dan 1 neiskorisceno
    //bocica : 5 ,1 dan 2 neiskorisceno
    //bocica : 6 ,2 dan 0 neiskorisceno
    //bocica : 7 ,2 dan 1 neiskorisceno
    //bocica : 8 ,2 dan 2 neiskorisceno
    //bocica : 9 ,3 dan 0 neiskorisceno

    $n = 3;
    $broj_dana = floor($n / 3);
    $broj_neiskoriscenih_tableta = $n % 3;//kada delimo % sa k imamo k mogucih vrednosti 0 1 2
    echo "<hr>";
    echo "Broj dana: ". $broj_dana;//vraca donji ceo deo ceil za gornji ceo broj.   
    echo "<hr>";
    echo "Broj neiskoriscenih tableta: ".$broj_neiskoriscenih_tableta;
    echo "<hr>";




?>