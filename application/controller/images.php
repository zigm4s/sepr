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

    public function view($image_param){
        $model = $this->loadModel('ImagesModel');

        if(isset($_POST['submit']) && isset($_POST['comment']) && $_POST['comment']):
            $comment = $_POST['comment'];
            if($GLOBALS['secure']):
                $comment = htmlspecialchars($comment);
            endif;

            $model->insertComment($image_param, $comment, $this->user->getId());
        endif;




        require 'application/views/_templates/header.php';
        if(isset($image_param)){
            $image = $model->getImage($image_param);
            $comments = $model->getComments($image_param);

            if($image->is_private && $image->username != $this->user->user){
                echo "no permission";
            }
            else {
                require 'application/views/images/view.php';
            }
        }

        require 'application/views/_templates/footer.php';
    }


    public function user($user=null){
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