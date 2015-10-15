<div class="row">
    <div class="col-lg-12"><h1>Images for user <?=$user?></h1></div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:26 PM
 */

foreach($images as $k=>$v){
    echo "<div class='col-md-4'>
        <a href='". URL ." images/". $v->id."'><img src='".URL . "public/img/uploads/" .$v->file_name . "." . $v->ext ."'' style='width:300px;height:300px;margin:30px;'></a>
        <div style='margin-left:30px;'>". $v->title ."</div></div>";
}
