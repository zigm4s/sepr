<?php
/**
 * Created by PhpStorm.
 * User: zslusnys
 * Date: 7-10-15
 * Time: 11:08
 */
foreach($images as $k=>$v){
    echo "<div class='col-md-4'>
        <a href='". URL ." images/view/". $v->id."'><img src='".URL . "public/img/uploads/" .$v->file_name . "." . $v->ext ."'' style='width:300px;height:300px;margin:30px;'></a>
        <div style='margin-left:30px;'>". $v->title ."</div></div>";
}
//print_r($images);
//echo $images[0]->title;