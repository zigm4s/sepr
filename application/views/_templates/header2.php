<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP MVC skeleton</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<!-- header -->
<div class="container">
    <!-- Info -->
    <div class="where-are-we-box">
        Everything in this box is loaded from <span class="bold">application/views/_templates/header.php</span> !
        <br />
        The green line is added via JavaScript (to show how to integrate JavaScript).
    </div>
    <h1>The header (used on all pages)</h1>
    <!-- demo image -->
    <h3>Demo image, to show usage of public/img folder</h3>
    <div>
        <img src="<?php echo URL; ?>public/img/demo-image.png" />
    </div>
    <!-- navigation -->
    <h3>Demo Navigation</h3>
    <div class="navigation">
        <ul>
            <!-- same like "home" or "home/index" -->
            <li><a href="<?php echo URL; ?>"><?php echo URL; ?>home</a></li>
            <li><a href="<?php echo URL; ?>home/exampleone"><?php echo URL; ?>home/exampleone</a></li>
            <li><a href="<?php echo URL; ?>home/exampletwo"><?php echo URL; ?>home/exampletwo</a></li>
            <!-- "songs" and "songs/index" are the same -->
            <li><a href="<?php echo URL; ?>songs/"><?php echo URL; ?>songs/index</a></li>
        </ul>
    </div>
    <!-- simple div for javascript output, just to show how to integrate js into this MVC construct -->
    <h3>Demo JavaScript</h3>
    <div id="javascript-header-demo-box">
    </div>
</div>


<header id="myCarousel" class="carousel slide" style="height: 100%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <!--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
        <?php
        $i = 0;
        foreach($allOffers as $key => $value){
            if($i == 0)
                $class = "active";
            else
                $class = "";

            echo '<li data-target="#myCarousel" data-slide-to="'. $i .'" class="'. $class .'"></li>';
            $i++;
        } ?>
    </ol>





    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <!--<div class="item active">
                <div class="fill" style="background-image:url('<?php echo URL . "/public/img/auto/116/0.jpg";?>');">

                    <div class="ribbon-wrapper">
                        <div class="ribbon">NEW!</div>
                    </div>

                </div>
                <div class="carousel-caption">
                    <h2 style="font-family: 'Roboto Slab', serif;">Mercedez Benz E200</h2>
                    <h3 >2010m. 130kW Automatic </h3>
                    <h4><a class="btn btn-success" href="/jvanautos/occasions/auto/116">View offer</a></h4>
                </div>
            </div>-->
        <?php
        $j=0;
        foreach($allOffers as $k=>$o){
            if($j == 0)
                $clasz = "active";
            else
                $clasz = "";
            ?>

            <div class="item <?php echo $clasz;?>">
                <div class="fill" style="background-image:url('<?php echo URL . "/public/img/auto/". $o->vehicleid ."/0.jpg";?>');">

                    <div class="ribbon-wrapper">
                        <div class="ribbon">NEW!</div>
                    </div>

                </div>
                <div class="carousel-caption">
                    <h2 style="font-family: 'Roboto Slab', serif;"><?php echo $o->vehicle->Brand . " " . $o->vehicle->Model; ?></h2>
                    <h3 ><?php echo $o->vehicle->Year . " yr. " . $o->vehicle->Power ." kW " . $o->vehicle->Gearbox; ?> </h3>
                    <h4><a class="btn btn-success" href="<?php echo URL ."occasions/auto/". $o->vehicleid;?>">View offer</a></h4>
                </div>
            </div>


            <?php $j++; }?>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>