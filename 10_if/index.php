<?php

    $a = 4;//promenjiva a dobijavrednost 5 najtacnije receno
    $b = 3;

    if ( $a ==  $b){//kad stavimo jedno = php ne tumaci kao gresku.0 je jedina brojevna vrednost koja je jednaka false
        echo "<p>$a je = $b</p>";
    }

    if ( $a !=  $b){
        echo "<p>$a je razlicito od $b</p>";
    }

    if ( $a <=  $b){
        echo "<p>$a je manje ili jednako od $b</p>";
    }

    echo "<p>Nastavljam dalje</p>";

    $br_1 = 3;
    $br_2 = "3";

    if ( $br_1 == $br_2){
        echo "<p>$br_1 jednaka je po vrednosti sa $br_2</p>";
    }

    if ( $br_1 === $br_2){
        echo "<p>$br_1 jednaka je po vrednosti i tipu sa $br_2</p>";
    }


    if ( $a < $b ){
        echo "<p> $a je manje od $b .</p>";
    }else{
        echo "<p> $a je vece ili jednako od $b .</p>";
    }

    echo "<p>Nastavljam ponovo dalje</p>";

    

?>