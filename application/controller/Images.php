<?php

/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:10 PM
 */
class Images extends Controller
{
    public function index($image=null)
    {
        $model = $this->loadModel('ImagesModel');
        if(isset($image)){
            $images = $model->getImage($image);
        }
        else{
            $images = $model->getAllImages();
        }

        require 'application/views/_templates/header.php';
        require 'application/views/images/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function imageForUser($user=null){
        $model = $this->loadModel('ImagesModel');

        if(!isset($user)){
            $images = $model->getAllImages();
        }
        else{
            $images = $model->getImagesForUser($user);
        }

        require 'application/views/_templates/header.php';
        require 'application/views/images/user.php';
        require 'application/views/_templates/footer.php';
    }

}