<?php
// Kreirati klasu Film koja sadrži:
// polje naslov
// metodu stampaj() za prikaz naslova filma.
// Kreirati tri objekta klase Film.
// U klasi Film dodati polja:
// reziser
// godinaIzdanja. 
// Izmeniti metodu tako da prikazuje sva polja.
// Testirati metode klase.

class Film{
    var $naslov;
    var $reziser;
    var $godina_izdanja;

    function stampaj(){
        echo "<table>";
            echo "<tr>";
                echo "<td>".$this->naslov."</p>";
                echo "<td>".$this->reziser."</p>";
                echo "<td>".$this->godina_izdanja."</p>";
            echo "</tr>";
        
        echo "</table>";

    }
}

$film_1 = new Film;
$film_1 -> naslov = "The Godfather";
$film_1 -> reziser = "Francis Ford Kopola";
$film_1 -> godina_izdanja = "1980";
$film_2 = new Film;
$film_2 -> naslov = "Brave Heart";
$film_2 -> reziser = "Mel Gibson";
$film_2 -> godina_izdanja = "1990";
$film_3 = new Film;
$film_3 -> naslov = "Memento";
$film_3 -> reziser = "Kristofer Nolan";
$film_3 -> godina_izdanja = "2006";

$film_1 ->stampaj();
$film_2 ->stampaj();
$film_3 ->stampaj();
?>