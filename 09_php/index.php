<?php
    $a = "Zdravo svete!";
    echo $a;
    echo "<br>";
    $a = 1;
    echo "Vrednost a je $a";
    // echo 'Vrednost a je $a';ovo ne bi radilo jer je 1navodnik Da bi unutar stringa prikazao int mora da ima duple navodnike.
    $c ="3";
    echo "<br>";
    echo $c * 2;
    
    $h =20;
    $m = 35;
    $rez = $h * 60 + $m;
    echo "<hr>";

    echo "Od ponoci je proslo ".$rez." minuta.";
    $sati = date('G');//uzima vreme sa lokalnog servera ili udaljenog servera. Ako server nije dobro podesendacepogresno vreme;
    $minuti = date('i');
    echo "<hr>";
    echo "<p>Tacno je ".$sati . "sati i ".$minuti . " minuta . </p>";

    date_default_timezone_set('Europe/Belgrade');//seteri i geteri
      
    $h =date('G');
    $m = date('i');
   
    echo "<hr>";
    $rez = $h * 60 + $m;
    echo "Od ponoci je proslo ".number_format($rez,0,",",".")." minuta.";
    echo "<hr>";
    $b = 5.5464646;
    $b = round($b, 2);
    echo $b;

?>