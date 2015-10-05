<?php

function getTotalLines(){
    $counter=0;
   if(file_exists("path.log")){
     $counter = file("path.log");
     $counter = count($counter);
    echo $counter;
   }
}
function getLogContent(){
    $data ="";
    $counter =1;
    if(file_exists("path.log")){
    $log = file("path.log");
        if(is_array($log)){
            foreach($log as $line){
                list($dt, $page) = explode('|',$line);
                $dt= @date('d-m-Y H:i:s',$dt);
                $data .= "<li>($counter) $dt: $page </li>";
                $counter++;
            }
            echo $data;
        }
    }
  }
?>