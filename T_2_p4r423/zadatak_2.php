<?php
// Zadatak 2 (Pijaca)
// Vlasnici jedne tezge na pijaci imaju stalni asortiman voća. Na početku dana, vlasnici
// iznose voće na tezgu, i za svaku vrstu voća poznata je količina i cena.

// Data su dva asocijativna niza $cena i $kolicina, u kojima su nazivi voća iz stalnog
// asortimana ključevi elemenata u oba niza. Vrednosti elemenata prvog niza $cena jesu
// cene voća (po kilogramu), dok su vrednosti elemenata drugog niza $kolicina količina
// voća koje se trenutno nalazi na tezgi (zadata u kilogramima). Neka oba niza imaju iste
// vrednosti ključeva (ne može se desiti da jedan ključ postoji u jednom nizu, a da ne
// postoji u drugom, i obratno).
// Pošto su ključevi iz oba niza nazivi voća iz stalnog asortimana, na tezgi se ne mora naći
// svaka vrsta voća (odnosno, dozvoljeno je da količina nekog voća bude jednaka 0).

// ➢ (5 poena) Kreirati dva niza $cena i $kolicina po uslovima zadatka.
// ➢ (10 poena) Napisti funkciju stanje($cena, $kolicina) kojoj je
// prosleđuju dva asocijativna niza po uslovu zadatka, a koja tekstom zelene
// boje ispisuje imena voća kojih ima na stanju. Ukoliko voća nema na stanju,
// iste informacije ispisati tekstom crvene boje.
// ➢ (15 poena) Vlasnici tezge žele da prvo ponude ono voće čija je ukupna
// vrednost maksimalna (ukupna vrednost nekog voća računa se kao proizvod
// njegove količine i cene po kilogramu).
// Napisati funkciju prvoPonudi($cena, $kolicina) kojoj je prosleđuju
// dva asocijativna niza po uslovu zadatka, a koja vraća naziv voća sa
// maksimalnom vrednošću. Ukoliko ima više takvih voća, vratiti bilo koje.
// ➢ (20 poena) Kupac dolazi na tezgu sa namerom da kupi neko voće. Njegov
// spisak želja dat je preko asocijativnog niza $kupovina čiji su ključevi nazivi
// voća, dok su vrednosti količine svakog voća u kilogramima koju želi da kupi.
// Napisati funkciju vrednostKupovine($cena, $kolicina,
// $kupovina) kojoj je prosleđuju tri asocijativna niza po uslovu zadatka, a koja
// vraća ukupnu cenu koju kupac treba da plati. Ukoliko nekog voća nema
// dovoljno na stanju (odnosno, želja kupca je da kupi više kilograma nekog
// voća nego što ga ima na tezgi), dati kupcu ukupnu količinu tog voća na tezgi.


// Data su dva asocijativna niza $cena i $kolicina, u kojima su nazivi voća iz stalnog
// asortimana ključevi elemenata u oba niza. Vrednosti elemenata prvog niza $cena jesu
// cene voća (po kilogramu), dok su vrednosti elemenata drugog niza $kolicina količina
// voća koje se trenutno nalazi na tezgi (zadata u kilogramima). 

//Neka oba niza imaju iste
// vrednosti ključeva (ne može se desiti da jedan ključ postoji u jednom nizu, a da ne
// postoji u drugom, i obratno).
// Pošto su ključevi iz oba niza nazivi voća iz stalnog asortimana, na tezgi se ne mora naći
// svaka vrsta voća (odnosno, dozvoljeno je da količina nekog voća bude jednaka 0).

// ➢ (5 poena) Kreirati dva niza $cena i $kolicina po uslovima zadatka.
$cena = [
    "jabuke" => 100,
    "kruske" => 80,
    "mandarine" => 120,
    "lubenica" => 70,
    "dinje" => 110
];
$kolicina = [
    "jabuke" => 10,
    "kruske" => 11,
    "mandarine" => 2,
    "lubenica" => 0,
    "dinje" => 25
];

// ➢ (10 poena) Napisti funkciju stanje($cena, $kolicina) kojoj je
// prosleđuju dva asocijativna niza po uslovu zadatka, a koja tekstom zelene
// boje ispisuje imena voća kojih ima na stanju. Ukoliko voća nema na stanju,
// iste informacije ispisati tekstom crvene boje.

function stanje($cena, $kolicina){
    foreach ($kolicina as $key => $kol){
        if ( $kol == 0 ){
            echo "<span style='color:red'>$key</span> ";
        }else{
            echo "<span style='color:green'>$key</span> ";
        }
    }
}

stanje($cena, $kolicina);

// ➢ (15 poena) Vlasnici tezge žele da prvo ponude ono voće čija je ukupna
// vrednost maksimalna (ukupna vrednost nekog voća računa se kao proizvod
// njegove količine i cene po kilogramu).
// Napisati funkciju prvoPonudi($cena, $kolicina) kojoj je prosleđuju
// dva asocijativna niza po uslovu zadatka, a koja vraća naziv voća sa
// maksimalnom vrednošću. Ukoliko ima više takvih voća, vratiti bilo koje.

function prvo_ponudi($cena, $kolicina){
    $max_vrednost = $cena['jabuke'] * $kolicina['jabuke'];
    $najskuplje_voce ="Jabuke";
    foreach ( $cena as $key => $val ){
        if ( $cena[$key] * $kolicina[$key] > $max_vrednost ){
            $max_vrednost = $cena[$key] * $kolicina[$key];
            $najskuplje_voce = $key;
        }
    }
    return $najskuplje_voce;
}

echo "<p>Najskuplje voce je ".prvo_ponudi($cena, $kolicina)."</p>";

// ➢ (20 poena) Kupac dolazi na tezgu sa namerom da kupi neko voće. Njegov
// spisak želja dat je preko asocijativnog niza $kupovina čiji su ključevi nazivi
// voća, dok su vrednosti količine svakog voća u kilogramima koju želi da kupi.
// Napisati funkciju vrednostKupovine($cena, $kolicina,
// $kupovina) kojoj je prosleđuju tri asocijativna niza po uslovu zadatka, a koja
// vraća ukupnu cenu koju kupac treba da plati. Ukoliko nekog voća nema
// dovoljno na stanju (odnosno, želja kupca je da kupi više kilograma nekog
// voća nego što ga ima na tezgi), dati kupcu ukupnu količinu tog voća na tezgi.
$kupovina = [
    "jabuke"=> 2,
    "mandarine"=>3,
    "dinje"=>1
];

function vrednost_kupovine($cena, $kolicina, $kupovina){
    $ukupna_cena = 0;
    foreach ( $kupovina as $key => $val ){
        if ( $kolicina[$key] < $kupovina[$key] ){
            $ukupna_cena += $kolicina[$key] * $cena[$key];
        }else{
            $ukupna_cena += $kupovina[$key] * $cena[$key];
        }
    }
    return $ukupna_cena;
};

echo "<p>Ukupna cena koju kupac treba da plati je ".vrednost_kupovine($cena, $kolicina, $kupovina)."</p>";
?>