<!-- Za dva uneta broja ispisati koji je veći a koji je manji. -->
<?php
    $a = 19;
    $b = 39.56;

    if ( $a > $b ){
        echo "<P>Veci je broj $a.</P>";
    }else{
        echo "<p>Veci je $b.</p>";
    }

    // zad4 . U odnosu na preuzete vrednosti AM i PM sa svog računara, ispisati da li je trenutno jutro ili popodne.

    $doba_dana = date("a");//https://www.php.net/manual/en/datetime.format.php
    if ( $doba_dana == "am"){
        echo "<p>Prepodne je. </p>";
    }else{
        echo "<p>Popodne je.</p>";
    }

    // U odnosu na pol (muški/ženski) koji je korisnik uneo prikazati odgovarajući avatar.

    $pol = "z";

    if ( $pol == "m"){
        echo "<p><img src='m.png' alt='slika_1'></p>";
    }else{
        echo "<p><img src='f.png' alt='slika_2'></p>";
    }

    // zad 2. Ispitati da li je uneta temperatura u plusu ili je u minusu. Ukoliko je temperatura nula, računati da je u plusu.

    $temp = -5;

    if ( $temp >= 0 ){
        echo "<p>Temperatura je u plusu. </p>";
    }else{
        echo "<p>Temperatura je u minusu. </p>";

    }

    // zad 5. Za preuzetu godinu sa računara i unetu godinu rođenja izračunati da li je osoba punoletna ili maloletna.

    $godina = date( "Y" );
    $godina_rodjenja = 2022; 
    echo $godina;

    if ( $godina - $godina_rodjenja >= 18 ){
        echo "<p>Osoba je punoletna</p>";
    }else{
        echo "<p>Osoba je maloletna</p>";

    }

    // zad 6. Poređati tri uneta broja od najmanjeg do najvećeg.

    $a = 10;
    $b = 9;
    $c = 55;

    if ( $a  > $b){
        $pom = $a;
        $a = $b;
        $b = $pom;
    }

    echo "<p>Veci je BROJ ".(($a > $b) ? $a : $b)."</p>";//termarni operator, koristi se kada zelimo unutar htmla da ugnjezdimo php;
    //koonkordinacija?
    //a je sigurno manja od b
    if ( $a > $c ){
        $pom = $a;
        $a = $c;
        $c = $pom;
    }
    //nakon ovog ifa u a je najmanja vrednost
    if ( $b > $c ){//if 
        $pom = $b;
        $b = $c;
        $c = $pom;
    }
    echo "<p>$a <= $b <= $c</p>";

    //BINARNE situacije ili jeste il nije;
    //elseif (uslov 2 ) ako prvi nije zadovoljen da li je ovaj drugi zadovoljen moze da imamo vise elseifova;

    $g = 17;

    if ( $g <= 10 ){
        echo "<p> Broj prve desetice</p>";
    }elseif($g <= 20){
        echo "<p> Broj druge desetice</p>";
    }else{
        echo "<p>Veci od 20 </p>";
    }
//    zad_7 Na osnovu unetog broja poena ispitati koju ocenu profesor treba da upiše učeniku. Učenik je položio ispit ukoliko ima više od 50 poena, u suprotnom je pao ispit. 
// Za više od 50 poena učenik dobija ocenu 6, 
// za više od 60 poena učenik dobija ocenu 7,
// za više od 70 poena učenik dobija ocenu 8, 
// za više od 80 poena učenik dobija ocenu 9 i 
// za više od 90 poena učenik dobija ocenu 10.

$poeni = 50;
if ( $poeni <= 50 ){
    echo "<p>Pali ste ispit gospodine</p>";
}elseif( $poeni <= 60 ){
    echo "<p>Dobili ste 6</p>";
}elseif( $poeni <= 70 ){
    echo "<p>Dobili ste 7</p>";
}elseif( $poeni <= 80 ){
    echo "<p>Dobili ste 8</p>";
}elseif( $poeni <= 90 ){
    echo "<p>Dobili ste 9</p>";
}else{
    echo "<p>Cestitke dobili ste 10</p>";
}
// zad 8. Preuzeti koji je dan u nedelji sa računara i ispitati da li je to radni dan ili je u pitanju vikend.

$danas = date('N');
$danas = (intval($danas));
if ( $danas > 5){
    echo "<p> Vikend je.</p>";
}else{
    echo "<p> NIje vikend.</p>";
}

// zad 9. Za vreme preuzeto sa računara ispisati 
// dobro jutro za vreme manje od 12 sati ujutru, 
// dobar dan za vreme manje od 18 sati popodne i u ostalim slučajevima ispisati dobro veče.

$tren_vreme = date("H");
$tren_vreme = (intval($tren_vreme));
if ( $tren_vreme < 12 ){
    echo "<p>Dobro jutro.</p>";
}elseif($tren_vreme < 18){
    echo "<p>Dobar dan.</p>";
}else{
    echo "<p>Dobro vece.</p>";
}

// zad 10. Uporediti dva uneta datuma i ispisati koji od njih je raniji.

$datum_1 = '31.01.2015';
$datum_2 = '01.01.2000';

if ( strtotime($datum_1) < strtotime($datum_2)){
    echo "<p> $datum_1 je raniji od $datum_2</p>";
}elseif(strtotime($datum_1) > strtotime($datum_2)){
    echo "<p> $datum_2 je raniji od $datum_1</p>";
}else{
    echo "<p> Datumi su isti</p>";
}

// zad 11. Radno vreme jedne programerske firme je od 9h do 17h. Preuzeti vreme sa računara i ispitati da li u to vreme firma radi ili ne radi.

$tren_vreme = date("H");
$tren_vreme = (intval($tren_vreme));

if ( $tren_vreme < 9 ){
    echo "<p> Vreme otvaranja 9:00.</p>";
}elseif($tren_vreme < 17){
    echo "<p> Vama na usluzi.</p>";
}else{
    echo "<p> Radno vreme je zavrseno.</p>";
}

// zad 12. Za unet početak i kraj radnog vremena dva lekara ispisati DA ukoliko se njihove smene preklapaju, u suprotnom ispisati NE.
$l_1_pocetak = 20;
$l_1_kraj = 21;

$l_2_pocetak = 21;
$l_2_kraj = 22;

if( $l_1_pocetak >= $l_2_kraj){
    echo "<p>NE.</p>";
}elseif( $l_2_pocetak >= $l_1_kraj){
    echo "<p>NE.</p>";
}else{
    echo "<p>DA.</p>";
}

// zad 12. Za uneti broj ispitati da li je paran ili nije.
// zad 13. Za uneti broj ispisati da li je deljiv sa 3 ili ne.
$a = 3;
if ( $a % 2 == 0){
    echo "<p>Paran.</p>";
}else{
    echo "<p>Neparan.</p>";

}

if ( $a % 3 == 0){
    echo "<p>Deljiv je sa 3.</p>";
}else{
    echo "<p>Nije deljiv je sa 3..</p>";

}

// zad 14. Za dva uneta broja, od većeg učitanog broja oduzeti manji i rezultat ispisati na ekranu.

$a = 18;
$b = 50;
if ( $a > $b){
    echo $a - $b;
}elseif( $a < $b){
    echo $b - $a;
}else{
    echo "<p>Brojevi su jednaki.</p>";
}
// zad 17. Za uneti broj ispitati da li je on manji ili veći od nule. Ukoliko je manji ili jednak nuli ispisati njegov prethodnik, a ukoliko je veći od nule ispisati njegov sledbenik.
// zad 18. Za tri uneta broja ispisati koji od njih ne najveći, koji od njih je srednji, a koji od nih je najmanji. 
// zad 19. Za učitani broj ispitati da li je ceo.
// zad 17.
echo "<hr>";
if ( $a <= 0 ){
    echo $a - 1; 
}else{
    echo $a + 1; 
}

// zad 18.

$a = 35;
$b = 20;
$c = 80;

if ( $a < $b ){
    $pom = $a;
    $a = $b;
    $b = $pom; 
}
if ( $a < $c ){
    $pom = $a;
    $a = $c;
    $c = $pom; 
}
if ( $b < $c ){
    $pom = $b;
    $b = $c;
    $c = $pom; 
}

echo "<p>NAjveci broj je $a srednji je $b a najmanji $c</p>";

//19.

$broj = 11.9;
if ( $broj == floor($broj)){
    echo "broj je ceo.";
}else{
    echo "Broj je decimalan.";
}
?>