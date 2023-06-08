<?php
// Domaći zadatak broj 10
// Datum postavljanja domaćeg zadatka: 19.05.2023.
// Rok za postavljanje domaćeg zadatka: 21.05.2023. do 17h
 
// ➢  Napisati klasu TekuciRacun koja ima tri atributa:
// ○     BrojRacuna (string) – odnosi se na broj računa u banci
// ○     Stanje (broj) – odnosi se na stanje u dinarima na dve decimale
// ○     Kurs (broj) – srednji kurs eura na današnji dan na 4 decimale
// ➢  Klasi dodati getere i setere.
// ➢  Napisati sledeće metode:
// ○     uplati - metoda koja od parametara prihvata broj (iznos), kao i string (valuta koja može biti “RSD” ili “EUR”), a koja uvećava stanje na računu za prosleđeni iznos i valutu.
// ○     isplati – metoda koja od parametara prihvata broj (iznos), kao i string (valuta koja može biti “RSD” ili “EUR”), a koja, ukoliko je moguće isplaćuje željeni iznos u prosleđenoj valuti (umanjuje stanje). Metoda vraća true ukoliko je isplata moguća, a u suprotnom vraća false.
// ○     stanje - metoda koja ispisuje trenutno stanje na računu u kontekstu „Stanje na računu broj ${broj_racuna} na dan ${trenutni_datum_i_vreme} je: ${stanje} RSD“
// ➢  U slučaju da se vrši isplata ili uplata u valuti EUR izvršiti potrebnu konverziju, i obratiti pažnju da stanje računa uvek mora da bude na 2 decimale.
// ➢  Nakon svake uspešne promene stanja, ispisati korisniku odgovarajuću poruku pomoću metode stanje.
// ➢ Kreirati barem tri objekta ove klase, testirati metode i demonstrirati ispravnost rada ispisivanjem odgovarajućih poruka na ekran.
 
// BONUS: uraditi sledeća ograničenja u seterima tako da se obezbedite da:
// Broj računa mora da bude u formatu xxx-xxxxxxxxxxxxx-xx ([3]-[13]-[2])
// Ukoliko se prosledi podatak sačinjen od cifara on mora da bude dužine 18
// Ukoliko postoji znak - on mora da se nađe nakon treće cifre i poslednje dve cifre moraju biti odvojene -
// Ukoliko je prosleđen format za -, središnji deo ne mora da ima 13 cifara ali mora da ima bar jednu različitu od 0, dopunite ga nulama sa leve strane tako da zadovoljite format (za dopunu koristiti ugrađnu php funkciju) 
// Prve tri cifre ne mogu početi 0 i moraju da pripadaju nizu brojeva koji predstavljaju identifikacioni broj banaka u Srbiji (pronađite ODLUKU O ODREĐIVANjU JEDINSTVENIH IDENTIFIKACIONIH BROJEVA BANAKA KAZA OBAVLjANjE PLATNOG PROMETA  na sajtu Narodne Banke Srbije) 
// Poslednje dve cifre su kontrolne cifre. Napisati svoju funkciju za izračunavanje kontrolnih cifara (više informacija i za testiranje koristiti http://www.cekos.rs/kontrolni-broj-izracunavanje-po-modulu-97) 
// U slučaju da prosleđeni podatak nije ispravan da možete od njega napraviti ispravan format računa vratiti odgovarajuću poruku. 

// Dodati atribut DozvoljeniMinus koji može da se setujete na true/false (dodati i setere i getere) . I prilikom kreiranja računa i isplate sa računa dozvoliti da stanje ide u minus samo u slučaju ako je ovaj atribut postavljen na true.

// Bonus domaći nije obavezan i za njega ne postoji rok. Kada imate vremena odradite ga i pošaljite mi kod na slack da ga proverim. 



class TekuciRacun{
    private $brojRacuna;
    private $stanje;
    private $kurs;

    public function __construct( $brojRacuna, $stanje, $kurs ){
        $this -> setBrojRacuna ($brojRacuna);
        $this -> setStanje($stanje);
        $this -> setKurs ($kurs);
    }
    public function setBrojRacuna($brojRacuna){
        $idBrBanaka = [105,115,145,155,160,165,170,190,200,205,220,250,265,295,325,340,370,375,380,385];
        if  ( gettype($brojRacuna) == "string" ){
            //Naredni red proverava da li su crtice na pravim pozicijama ako ne daje odgovarajucu poruku
            if ( substr( $brojRacuna,3,1) == "-" && substr( $brojRacuna,strlen( $brojRacuna)-3,1) == "-" ){
                //Naredni red vadi deo stringa izmedju prve i druge crtice
                $srDeo = substr( $brojRacuna,strpos($brojRacuna,"-")+1,strlen( $brojRacuna)-strpos($brojRacuna,"-")-1-3) ;
                //ako je 13 karaktera proverava da li su prva 3 id br neke banke 
                if ( strlen($srDeo) == 13 ){
                    $tacanIdBr = false;
                    for ( $i = 0; $i < count ( $idBrBanaka ); $i++ ){
                        if ( $idBrBanaka[$i] == substr( $brojRacuna,0,3)){
                            $tacanIdBr = true;
                            break;
                        }
                    }
                    if ($tacanIdBr ){
                        $this -> brojRacuna = $brojRacuna;
                    }else{
                        echo "<p>Pogresan identifikacioni broj banke(prve tri cifre).</p>";
                    }
                }elseif ( strlen($srDeo) <= 0 ){
                        echo "<p>Pogresan format racuna mora imati barem jedan broj nakon - .</p>";
                        exit;
                //da li ima karakter razlicit od nule cak i da je jedan i dodaj nule svedok ih nije 13 karaktera 
                }elseif ( str_contains ($srDeo,"1") || str_contains ($srDeo,"2") || str_contains ($srDeo,"3") || str_contains ($srDeo,"4") || str_contains ($srDeo,"5") || str_contains ($srDeo,"6") || str_contains ($srDeo,"7") || str_contains ($srDeo,"8") || str_contains ($srDeo,"9")){
                    //ako ih je manje od 13 ako je vise prikazi por
                    if ( strlen($srDeo) < 13 ){
                        $i = strlen($srDeo);
                        while (  $i < 13 ){
                            $srDeo.="0";
                            $i++;
                        }
                        //ovde se spaja string u ispravan format racuna
                        $brIsparavanFormat = substr( $brojRacuna,0,4).$srDeo.substr( $brojRacuna,strlen( $brojRacuna)-3,3);
                        $tacanIdBr = false;
                        //ovde proveravam da li su prva tri id neke banke
                        for ( $i = 0; $i < count ( $idBrBanaka ); $i++ ){
                            if ( $idBrBanaka[$i] == substr( $brIsparavanFormat,0,3 ) ){
                                $tacanIdBr = true;
                                break;
                            }
                        }
                        if ( $tacanIdBr ){
                            $this -> brojRacuna = $brIsparavanFormat; 
                        }else{
                            echo "<p>Pogresan identifikacioni broj banke.</p>";
                        }
                    }else{
                        echo "<p>Previse karaktera u unetom racunu banke.</p>";
                    }
                }else{
                    echo "<p>Mora imati barem jednu cifru unutar razlicitu od 0 ***-  -** !</p>";
                }
                
            }else{
                echo "<p>Pogresan format broja racuna - potrebna posle  prva 3 broja i pre poslednja 2 broja.</p>";
            }
        }elseif ( gettype($brojRacuna) == "integer"  && strlen (  $brojRacuna ) == 18 ){
            $brojRacuna = (string)$brojRacuna;
            $brojRacuna = substr($brojRacuna,0,3 )."-".substr($brojRacuna,3,16 )."-".substr($brojRacuna,16);
            $tacanIdBr = false;
                for ( $i = 0; $i < count ( $idBrBanaka ); $i++ ){
                    if ( $idBrBanaka[$i] == substr( $brojRacuna,0,3 ) ){
                       $tacanIdBr = true;
                       break;
                    }
                }
                if ( $tacanIdBr ){
                    $this -> brojRacuna = $brojRacuna; 
                }else{
                    echo "<p>Pogresan identifikacioni broj banke.</p>";
                }
        }else{
            echo "<p>Pogresan format unetog broja racuna</p>";
        }
    }
    //setStanje
    public function setStanje($stanje){
        $stanje = round ( $stanje , 2);
        $this -> stanje = $stanje;
    }
    //setKurs
    public function setKurs($kurs){
        $kurs = round ( $kurs , 4);
        $this -> kurs = $kurs;
    }
    //get br racuna
    public function getBrojRacuna(){
        return $this -> brojRacuna;
    }
    //get stanje
    public function getStanje(){
        return $this -> stanje;
    }
    //get kurs
    public function getKurs(){
        return $this -> kurs;
    }
    //dobijeni numerički podatak se pomnoži sa 100, nakon čega se podeli sa 97
    // dobijeni rezultat se sastoji iz celog dela i decimalnog dela. 
    //Kada se decimalni deo pomnoži sa 97 dobije se rezultat koji zaokružen na najbliži ceo broj predstavlja ostatak deljenja i 
    //on se oduzima od broja 98
    //tako dobijena razlika izražena sa dve cifre jeste kontrolni broj 
    public function kontrolniBroj(){
        $brRacuna = $this->getBrojRacuna();
        $brRacuna = str_replace( $brRacuna,"-","");
        $brRacuna = (int) $brRacuna;
        $kontrolniBr = (($brRacuna * 100)/ 97);
        $kontrolniBrr = floor( $kontrolniBr);
        $decOstatak =  $kontrolniBr - $kontrolniBrr;
        $a = $decOstatak * 97;
        $b = round( $a ); 
        $kbr = 98 - $b;

        return $kontrolniBr;
    }
    //uplati
    public function uplati( $iznos,$valuta ){
        $stanjeRacuna = $this -> getStanje();
        $kurs =  $this -> getKurs();
        if ( $valuta == "RSD"){
            $newStanje = $stanjeRacuna + $iznos;
            // $newStanje = round (  $newStanje, 2 );
            $this -> setStanje($newStanje);
            echo "<p>Uplata Uspesna. Nakon ove tansakcije u valuti $valuta</p>";
            $this -> stanje();
        }elseif ( $valuta == "EUR" ){
            $newStanje = $stanjeRacuna + ( $kurs * $iznos ) ;
            // $newStanje = round (  $newStanje, 2 );
            $this -> setStanje($newStanje);
            echo "<p>Uplata Uspesna. Nakon ove tansakcije u valuti $valuta</p>";
            $this -> stanje();
        }else{
            echo "<p>GRESKA U UPLATI: POGRESNA VALUTA. 'RSD' ili 'EUR' obavezna valuta</p>";
        }
    }
    //isplati
    public function isplati( $iznos,$valuta ){
        $stanjeRacuna = $this -> getStanje();
        $kurs =  $this -> getKurs();
        if ( $valuta == "RSD" || $valuta == "EUR" ){
            if ( $valuta == "EUR" ){
                $iznos = $iznos * $kurs;
            }
            if ( $iznos <= $stanjeRacuna){
                $newStanje = $stanjeRacuna - $iznos;
                // $newStanje = round (  $newStanje, 2 );
                $this -> setStanje($newStanje);
                echo "<p>Isplata Uspesna. Nakon ove tansakcije</p>";
                $this -> stanje();
                return true;
            }else{
                echo "<p>GRESKA U ISPLATI. Nedovoljno sredstavana racunu.</p>";
                return false;
            }
        }else{
            echo "<p>GRESKA U ISPLATI: POGRESNA VALUTA. 'RSD' ili 'EUR' obavezna valuta</p>";
        } 
    }
    public function stanje(){
        echo "<p>Stanje na racunu BR racuna: <span style='color:red'>".$this->getBrojRacuna()."</span> na datum ".date ( "d-m-Y H:i") ." h .Je:  <span style='color:blue'>" .number_format($this->getStanje(),"2",".",","). "</span> RSD<p>";
    }
}
$racun_1 = new TekuciRacun("105-5-27",20158.98654,117.986589);
$racun_1 -> uplati( 10,"EUR");
$racun_1 -> isplati( 100,"EUR");

// var_dump ($racun_1);
// echo $racun_1 -> getBrojRacuna();
// echo "<br>";
// echo $racun_1 -> getStanje();
// echo "<br>";
// echo $racun_1 -> getKurs();
// echo "<br>";
echo "<hr>";
echo $racun_1 -> kontrolniBroj();
// $br = "012-1555-55";
// if ( substr( $br,3,1) == "-" && substr( $br,strlen($br)-3,1) == "-" ){
//     echo "<p>jeste</p>";
// }else{
//     echo "<p>Nije</p>";
    
// }
// $srDeo = substr( $br,strpos($br,"-")+1,strlen($br)-strpos($br,"-")-1-3) ;
// echo $srDeo;
// if ( strlen($srDeo) < 13 ){
//     $i = strlen($srDeo);
//     while (  $i < 13 ){
//         $srDeo.="0";
//         $i++;
//     }
// }
// echo $srDeo;
// echo "<br>";
// echo strlen ( $srDeo );
// $ispravanRacun = substr( $br,0,4).$srDeo.substr( $br,strlen($br)-3,3);
// echo "<br>";
// echo $ispravanRacun;

// echo strpos($br,"-");
// echo strpos($br,"-",3);k
// echo strpos($br,"-");
// echo $br[3];
// echo $br[17];
// $a =123564;
// echo strlen($a);
// echo "<br>";
// echo substr( $a,0,3);
// $BR= 123456789123456789;
// echo gettype($BR);
// var_dump(strlen ( $BR));
$br = 32.123;
$br = $br / 100;
echo "<hr>";
echo round ( $br);

?>