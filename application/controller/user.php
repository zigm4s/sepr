<?php

/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/6/2015
 * Time: 12:10 PM
 */
class User extends Controller
{
    private $model;

    function __construct(){
        parent::__construct();
        if(!$this->user)
            $this->model = $this->loadModel('UserModel');
        else
            $this->model = $this->user;
    }

    public function index($image=null)
    {


        echo "<pre>";
        print_r($this->model);
        echo "</pre>";
        $images = $this->model->getAllImages();

        require 'application/views/_templates/header.php';
        require 'application/views/user/login_gui.php';
        require 'application/views/_templates/footer.php';
    }

    public function login(){
//        $model = $this->loadModel('UserModel');

        if($_POST && isset($_POST['username']) && isset($_POST['password'])):
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember_me = $_POST['remember_me'];

            $login = $this->model->login($username, $password, $remember_me);
        endif;


        //Header
        require 'application/views/_templates/header.php';
        //Container
        require 'application/views/user/login_gui.php';
        //Footer
        require 'application/views/_templates/footer.php';
    }

    public function logout(){
        $this->model->logout();
    }

    public function register(){        
        $register_response = null;

        if($_POST && isset($_POST['username']) && isset($_POST['password'])):
            $username = $_POST['username'];
            $password = $_POST['password'];

            $register_response = $this->model->register($username, $password);

        endif;

        //require 'application/views/_templates/header.php';
        require 'application/views/user/register_gui.php';
        //require 'application/views/_templates/footer.php';
    }

    public function upload(){
        if ( isset( $_POST["submit"] )) {
            $title = $_POST['title'];
            $can_comment = $_POST['can_comment'];
            $owner = $this->user->getId();
            $target_dir = "./public/img/uploads/";
            $random_name = $this->user->rand_string(50);
            $target_file = $target_dir . basename($random_name.".jpg");
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            //// Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["uploadfile"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {

                    $this->user->add_image_to_db($title, $random_name, $imageFileType, $_FILES["uploadfile"]["size"], $can_comment, $owner);
                    echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        require 'application/views/_templates/header.php';
        require 'application/views/user/upload.php';
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