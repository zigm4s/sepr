<?php
//namespace SEPR;
/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/4/2015
 * Time: 10:12 PM
 */
class Images
{
    protected $_db;

    public function __construct(PDO $db){
        $this->_db = $db;
    }

    public function return_all(){
        $stmt = $this->_db->prepare("SELECT * FROM images");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function return_for_user(User $user){
        $stmt = $this->_db->prepare("SELECT * FROM images WHERE owner=?");
        $stmt->execute(array($user->getId()));
        return $stmt->fetchAll();
    }



}