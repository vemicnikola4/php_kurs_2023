<?php
    // Napraviti program koji za uneti pol i broj godina korisnika ispisuje da li je korisnik muškarac ili žena i da li je punoletan
    $g = 18;
    $p = 'z';

    If ( $p == 'm'){
        if ( $g >= 18 ){
            echo "Musko punoletan.";
        }else{
            echo "Musko maloletan.";
        }
    }else{
        if ( $g >= 18 ){
            echo "Zensko punoletna.";
        }else{
            echo "Zensko maloletna.";
        }
    }
    echo "<hr>";

    If ( $p == 'm' && $g >= 18){
        echo "Musko punoletan.";
    }elseif ( $p == 'm' && $g < 18){
        echo "Musko maloletan.";
    }elseif ( $p !== 'm' && $g >= 18){
        echo "Zensko punoletna.";
    }else{
        echo "Zensko maloletna.";

    }
    echo "<hr>";
    echo "<p>***zad 13***</p>";
    $n = 13;

    if ( !($n % 2 == 0) ){
        echo "<p>Neparan je</p>";
    }else{
        echo "<p>Paran je</p>";    
    }
   
?>