<?php
/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:22 PM
 */
foreach($images as $k=>$v){
    echo "<img src='".URL . "public/img/uploads/" .$v->file_name . "." . $v->ext ."'' style='width:300px;height:300px;'>";
}
//print_r($images);
//echo $images[0]->title;