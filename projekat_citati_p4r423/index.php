<?php
include_once("style.css");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Citati</title>
    
</head>
<body>
    <?php
    if ( isset ( $_GET['citati']) ){
        $citati = $_GET['citati'];
        $txt_to_array = file ( "$citati.txt" );
        $niz_citati = [];
        $niz_autori = [];
        for ( $i = 0; $i < count ( $txt_to_array ); $i++ ){
            if ( $i %2 == 0 ){
                array_push ( $niz_citati , $txt_to_array[$i]);
            }else{
                array_push ( $niz_autori , $txt_to_array[$i]);
                }
            }
        }else{
            $fajlovi = ['ljubav','motivacija','posao','zdravlje'];
            $a = mt_rand(0,count($fajlovi)-1);
            $citati = $fajlovi[$a];

            $txt_to_array = file ( "$citati.txt" );
            $niz_citati = [];
            $niz_autori = [];
            for ( $i = 0; $i < count ( $txt_to_array ); $i++ ){
                if ( $i %2 == 0 ){
                    array_push ( $niz_citati , $txt_to_array[$i]);
                }else{
                    array_push ( $niz_autori , $txt_to_array[$i]);
                }
            }
        }
        $a = mt_rand ( 1,6 );
        for ( $i = 0; $i < 3; $i++){
            $b = mt_rand( 1,6 );
            if ( $b !== $a ){
                break;
            }else{ 
                $i--;
            }
        }
        for ( $i = 0; $i < 3; $i++){
            $c = mt_rand( 1,6 );
            if ( $c !== $a && $c !== $b){
                break;
            }else{ 
                $i--;
            }
        }
    ?>

    <!-- ***NAVIGATION MENU*** -->
        <?php
        echo "<nav class='navbar navbar-expand-md  $citati'>"
        ?>
        <div class="container-xxl">
            <a href="index.php" class="navbar-brand">
                <span class="fw-bolder fs-2 text-white d-none d-md-inline">
                    Najlepši citati
                </span>
            </a>
            <!-- toggle button for mobile nav -->
            <div class="navbar-light">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>

            <div class="collape navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php?citati=zdravlje" class="text-white nav-link fw-bold ms-md-3 fs-5">Zdravlje
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?citati=ljubav" class=" text-white nav-link fw-bold ms-md-3 fs-5">Ljubav
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?citati=motivacija" class="text-white nav-link fw-bold ms-md-3 fs-5">Motivacija
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?citati=posao" class="text-white nav-link fw-bold ms-md-3 fs-5">Posao
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- navbar-brand moze biti neki tekst ili logo 
        data-bs-target => sta ce kolapsovati kada kliknemo na ovo
        aria-controls => omogucava klijentima koji citaju kod da ga malo bolje razumeju sta ovo dugme kontrolise
        aria-controls => ime buttona-->
    </nav>

    <!-- HEADER -->

    <header class="bg-light ">
        <div id="carouselExampleControls" class="carousel slide container-md carousel-fade " data-ride="carousel"  >
            <div class="carousel-indicators pb-3 ">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner  ">
                <div class="carousel-item active mt-2">
                    <div class="overlay-image" style="background-image:url(<?php echo "./images/img".$citati."_".$a.".png";?>)"></div>
                    <div class="container ">
                    <div class="carousel-caption d-none d-md-block">
                        <?php
                         echo "<h5 class='fw-bolder lead pb-3 fs-1  shadow-sm '>".ucfirst("$citati")."</h5>"?>
                    </div>
                    </div>
                </div>
                <div class="carousel-item  mt-2">
                    <div class="overlay-image" style="background-image:url(<?php echo "./images/img".$citati."_".$b.".png";?>)"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <?php
                         echo "<h5 class='fw-bolder lead pb-3 fs-1  shadow-sm '>".ucfirst("$citati")."</h5>"?>
                    </div>
                    </div>
                <div class="carousel-item  mt-2">
                    <div class="overlay-image" style="background-image:url(<?php echo "./images/img".$citati."_".$c.".png";?>)">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <?php
                         echo "<h5 class='fw-bolder lead pb-3 fs-1  shadow-sm '>".ucfirst("$citati")."</h5>"?>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </header>
    <?php

    // ***SECTION CITATI***
    
    echo "<section id='citat' class='bg-light'>";
        echo '<div class="container-lg">';
            echo '<div class="row justify-content-center align-items-center">';
                echo '<div class="col-md-5 text-center  py-5">';
                    $index = mt_rand( 0, count($niz_citati)-1);
                    echo "<p  id='text_citata' class='fst-italic  border-top-5 fw-bolder fs-2 my-3'>".$niz_citati[$index]."</p>";
                    echo "<p id='autor' class='fw-bold fs-4'>- ".$niz_autori[$index]." -</p>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</section>";    
    
    // ***FOOTER***

    echo "<footer class='$citati border border-top-white '>";
        echo "<div class='footer text-center text-white fw-bolder lead  pt-3 pb-1.5 '>";
            $ind = date('w');
            $dani = ['Nedelja','Ponedeljak','Utorak','Sreda','Četvrtak','Petak','Subota'];
            $dan = $dani[$ind];
            echo "<p>$dan ".date ( 'd/m/y H:i')." h</p>";
        echo '</div>';
    echo  "</footer>";
?>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


