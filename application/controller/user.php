<?php

/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:10 PM
 */
class User extends Controller
{
    public function index($image=null)
    {
        $model = $this->loadModel('UserModel');
        echo "<pre>";
        print_r($model);
        echo "</pre>";
        if($model->loggedIn){
            echo "true";
        }
        else{
            echo "false";
        }

        require 'application/views/_templates/header.php';
        require 'application/views/user/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function login(){
        $model = $this->loadModel('UserModel');

        if($_POST && isset($_POST['username']) && isset($_POST['password'])):
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember_me = $_POST['remember_me'];

            $login = $model->login($username, $password, $remember_me);
            print_r($login);
        endif;

        require 'application/views/_templates/header.php';
        require 'application/views/user/login.php';
        require 'application/views/_templates/footer.php';
    }

    public function logout(){
        $model = $this->loadModel('UserModel');

        $model->logout();
    }

    public function register(){
        $model = $this->loadModel('UserModel');

        if($_POST && isset($_POST['username']) && isset($_POST['password'])):
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $model->register($username, $password);
        endif;

        require 'application/views/_templates/header.php';
        require 'application/views/user/register.php';
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