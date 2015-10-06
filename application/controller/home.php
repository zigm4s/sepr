<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
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

    public function user($user=null){
        $model = $this->loadModel('ImagesModel');

        if(!isset($user)){
            //TODO: when accessing this while logged in, show uploaded images and
            //TODO: allow user uploading new images.
            $images = $model->getAllImages();
        }
        else{
            $images = $model->getImagesForUser($user);
        }

        require 'application/views/_templates/header.php';
        require 'application/views/images/user.php';
        require 'application/views/_templates/footer.php';
    }

    public function about()
    {
        // debug message to show where you are, just for the demo
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/about.php';
        require 'application/views/_templates/footer.php';
    }

    public function contact()
    {
        // debug message to show where you are, just for the demo
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/contact.php';
        require 'application/views/_templates/footer.php';
    }

    public function login()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/login.php';
        require 'application/views/_templates/footer.php';
    }

    public function register()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/register.php';
        require 'application/views/_templates/footer.php';
    }

    public function logout()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/home/logout.php';
        require 'application/views/_templates/footer.php';
    }

}
