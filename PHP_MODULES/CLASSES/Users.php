<?php
require_once("User.php");
//namespace SEPR;
/**
 * Created by PhpStorm.
 * User: Zigmas
 * Date: 10/4/2015
 * Time: 9:16 PM
 */

//namespace SEPR;

class Users
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $created;
    private $modified;
    private $active;

    protected $_db;


    public function __construct(PDO $db){
        $this->_db = $db;
    }

    public function return_all(){
        $stmt = $this->_db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findByEmail($email){
        $stmt = $this->_db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute(array($email));
        return $stmt->fetchObject("User");
//        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//    public function


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }


}