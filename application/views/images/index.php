<?php

/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:22 PM
 */
foreach($images as $k=>$v){
    echo "<div class='col-md-4'>
        <a href='". URL ." images/view/". $v->id."'><img src='".URL . "public/img/uploads/" .$v->file_name . "." . $v->ext ."'' style='width:300px;height:300px;margin:30px;'></a>
        <div style='margin-left:30px;'>". $v->title ." by <a href='". URL ."images/user/" . $v->username ."'>" . $v->username ."</a></div></div>";
}
//print_r($images);
//echo $images[0]->title;