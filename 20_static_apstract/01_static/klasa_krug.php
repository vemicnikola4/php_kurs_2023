<?php
// Kreirati klasu Krug koja od zaštićenih polja sadrži:
// r (poluprečnik kruga)
// Obezbediti odgovarajuće geter, seter, kao i konstruktor
// Napisati metodu obimKruga koja računa obim kruga
// Napisati metodu povrsinaKruga koja računa povrišinu kruga
// Definisati broj Pi 
// kao konstantu
// kao statičko polje

class Krug{

    protected $r;
    const PI = 3.14;
//mozemo da pi dodamo kao polje;
    //public $pi;
    //AKo ga stavimo ovako svaki objekat ce imati svoj pi.
    //Potrebno nam je da svi objekti ma koliko da ih ima . Imaju zajednicku promenjivu. I ne samo to nego i jace zelimo da bude konstanta.
    //kako podesiti dA Bude kao konstanta
    //prvo rec const
    //Konsatanta je promenjiva kojoj se na pocetku dodeljuje vrednost i vise se ne moze menjati..
    //Konstante nemaju dolar i pisu se velikim slovom(nije greska ni malim)..
    //kad napravimo const to povlacivisestvari.
    //i ako imamo vise objekata oni svi dele ovu jednu konstantu. 
    //KLasa zahteva da se odma dodeli vrednost kod konstante te ne moze da pude podeasavana u seteru.
    //Konstanta se takodje naledjuje.
    public function __construct ( $r ){
        $this -> setR( $r );
    }

    public function setR( $r ){
        if ( $r > 0 ){
            $this -> r = $r;

        }else{
            $this -> r = 0;
        }
    }
    public function getR(  ){
        return $this -> r;
    }
    // obim 2r p
    public function obimKruga ( ){
        //konstantu pozivamo Krug::PI
        //polju pristupamo preko $this jer je karakteristicno za vaki objekat koji se poziva dok je konstanta zajednicka za sve objekte iz date klase.
        //PI nije karakteristika nekog objekta vec cele klase.
        return ($this -> r *  2) *  Krug::PI;
        // self::PI unutar same klase trazimo konstantu pi.
    }
    // r na kv p 
    public function povrsinaKruga ( ){
        // self::PI unutar same klase trazimo konstantu pi.
        //Cesce se koriti self::PI
        return ($this -> r * $this -> r) * self::PI;
        //$this -> r ** 2;
    }

}
//*** Staticka polja i staticke metode***
//Slicno kao i konstanta treba samo static modifikator da se doda ispred. Postoji samo jedan primerak polja ili metode bez obzira koliko objekata ima. Kodstatic moze se menjati vrednosti.
// public static $statikPolje = "Bla bla";

// public static $statikMetoda(){
//     echo "Nesto";
// }
// //poziv 
// Krug::StatikPolje;
// Krug::StatikMetoda;

//Kod konstante 
?>