<?php
$letovi = [
    ["dest"=>"Pariz","country"=>"France","time" => "07:10"],
    ["dest"=>"Madrid","country"=>"Spain","time" => "15:00"],
    ["dest"=>"Madrid","country"=>"Spain","time" => "16:30"],
    ["dest"=>"Belgrade","country"=>"Serbia","time" => "19:25"],
    ["dest"=>"Solun","country"=>"Greece","time" => "09:50"],
    ["dest"=>"Valeta","country"=>"Malta","time" => "18:30"],
];
function ispis_svih_letova( $let ){
    for ( $i = 0; $i < count ( $let ); $i++ ){
        echo "<p>". $let[$i]['dest'] ." - ".$let[$i]['country'] ." - ".$let[$i]['time']."</p>";
    }
}

ispis_svih_letova( $letovi );
// Ispisi sve letove plavom bojom ako leteprepodne a ljubic ako leteposle podne

function ispis_svih_letova_boje( $let ){
    
    for ( $i = 0; $i < count ( $let ); $i++ ){
        // $vreme = (int)substr( $let[$i]['time'],0,2);
        $vreme = strtotime( $let[$i]['time'] );
        // if ( $let[$i]['time'] < 12 )
        if ( $let[$i]['time'] < strtotime( '12:00' ) ){
            echo "<p style='color:blue'>". $let[$i]['dest'] ." - ".$let[$i]['country'] ." - ".$let[$i]['time']."</p>";
        }else{
            echo "<p style='color:purple'>". $let[$i]['dest'] ." - ".$let[$i]['country'] ." - ".$let[$i]['time']."</p>";
        }
    }
}
ispis_svih_letova_boje( $letovi );
?>