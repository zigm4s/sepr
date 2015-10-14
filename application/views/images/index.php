



<style>

</style>

<?php
/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:22 PM
 */

foreach($images as $k=>$v){
        echo "<img id=\"firstname\" src='".URL . "public/img/uploads/" .$v->file_name . "." . $v->ext ."'' style='width:150px;height:150px;padding:20px'>";
}


//print_r($images);
//echo $images[0]->title;
?>
