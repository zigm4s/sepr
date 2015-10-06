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