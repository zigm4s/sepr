<?php 
ob_start();
//include "./application/config/class.loginsys.php";
//if(!isset($LS)){
//    $LS=new LoginSystem();
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Used cars for sale">
    <title>SEPR</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>public/css/modern-business.css" rel="stylesheet">
<!--    <link href="--><?php //echo URL; ?><!--public/css/jvanautos.css" rel="stylesheet" charset="utf-8" />-->

    <!-- Custom Fonts -->
    <link href="<?php echo URL; ?>public/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery Version 1.11.1 -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js" defer></script>

    <script src="<?php echo URL; ?>public/owl-carousel/owl.carousel.min.js" defer></script>

    <!-- Owl Carousel Assets -->
    <link href="<?php echo URL; ?>public/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/owl-carousel/owl.theme.css" rel="stylesheet">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                 data-target="#navBar"
                 style="color: #777;
background-image: linear-gradient(to bottom, #cbe37f, #BADA55);">
                    <span class="sr-only">Toggle navigation</span>
                    <!--<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>-->
                    <span class="fa fa-bars" style="width:100%;"></span>
                </button>
<!--                <a class="navbar-brand" href="--><?php //echo URL; ?><!--"><img class="logo" style="vertical-align:middle;border:0;-ms-interpolation-mode:bicubic;" src="--><?php //echo URL; ?><!--public/img/van2.png"></a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navBar">
                <ul style="color: #000;" class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo URL; ?>home/about">About</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>occasions/index/1">Occasions</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>home/contact">Contact</a>
                    </li>

<!--                    --><?php //
//                    if(!$LS->isLogged())
//                    {
//                    echo "
//                    <li>
//                        <a href='". URL . "home/login'>Login</a>
//                    </li>";
//                    }
//                    else{
//                        ?>
<!---->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">Manage<span class="caret"></span></a>-->
<!--                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">-->
<!--                                <li role="presentation" class="dropdown-header">Management options</li>-->
<!--                                <li role="presentation"><a role="menuitem" tabindex="-1" href="--><?php //echo URL;?><!--occasions/add">Add a vehicle</a></li>-->
<!--                                <li role="presentation"><a role="menuitem" tabindex="-1" href="--><?php //echo URL;?><!--offers">Manage Offers</a></li>-->
<!--                                <li role="presentation" class="divider"></li>-->
<!--                                <li role="presentation" class="dropdown-header">End session</li>-->
<!--                                <li role="presentation"><a role="menuitem" tabindex="-1" href="--><?php //echo URL;?><!--home/logout">Log out</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--  --><?php
//                    }
//                    ?>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php
if($_SERVER['REQUEST_URI'] != "/jvanautos/"){
//echo "cia turi buri breadcrumbsai";
    }
    else{
        ?>
<!-- Header Carousel -->


<!--        <section style=" height: 100%; width:100%; background-image: url('./public/img/main_bg.jpg');">-->
<!--            <div class="well" style="position:absolute; left: 50%; top: 50%; width: 300px; height: 100px;">asdas</div></section>-->



          <?php  }
?>
<?php
//breadcrumbs for later
//echo "<ul id='crumbs'>";
/* get array containing each directory name in the path */
/*
$parts = explode("/", dirname($_SERVER['REQUEST_URI']));
echo "<li><a href='/'>Home</a></li>";
foreach ($parts as $key => $dir) {
switch ($dir) {
case "about": $label = "About Us"; break;
*/
/* if not in the exception list above,
use the directory name, capitalized */
/*default: $label = ucwords($dir); break;*/

//}
/* start fresh, then add each directory back to the URL */
/*$url = "";
for ($i = 1; $i <= $key; $i++)
{ $url .= $parts[$i] . "/"; }
if ($dir != "")
echo "<li>> <a href=$url>$label</a></li>";
}
echo "</ul>";
*/
?>
    <!-- Page Content -->
    <div class="container">