<?php

class UserModel
{
    private $config = array(
      "keys" => array(
          "cookie" => "asf#@$!12^%%#%##ASfasfsad",
          "salt" => "s3c()rePr0gr4m!nG"
      )  ,
    );

    private $db;
    private $isConnection = false;
    public $loggedIn = false;
    public $user = false;
    private $remember_cookie;

    function __construct($db)
    {
        session_start();

        try{
            $this->isConnection = true;
            $this->db = $db;

        }catch (\PDOException $e){
            exit("Exception initiation your database");
        }

    }

    public function login($username, $password, $remember_me = false, $cookies = true){
        if($this->isConnection == true) {
            $query = "SELECT username, password, password_salt FROM users WHERE username=:username";
            $sql = $this->db->prepare($query);
            $sql->bindValue(":username", $username);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                return false;
            } else {
                $rows = $sql->fetch(PDO::FETCH_ASSOC);
                $user_name = $rows['username'];
                $user_pass = $rows['password'];
                $user_salt = $rows['password_salt'];
                $saltedPass = hash('sha256', $password . self::$config['keys']['salt'] . $user_salt);

            }

            if ($saltedPass == $user_pass || $password == "") {
                if ($cookies === true) {

                    $_SESSION['sepr_curuser'] = $user_name;
                    setcookie("sepr_login", hash("sha256", self::$config['keys']['cookie'] . $user_name . self::$config['keys']['cookie']), strtotime(self::$config['cookies']['expire']), self::$config['cookies']['path'], self::$config['cookies']['domain']);

                    if ($remember_me === true && self::$config['features']['remember_me'] === true) {
                        setcookie("sepr_rememberMe", $user_name, strtotime(self::$config['cookies']['expire']), self::$config['cookies']['path'], self::$config['cookies']['domain']);
                    }
                    $this->loggedIn = true;

                    // Redirect
                    header("Location: /");
                }
                return true;
            }
        }
    }

    public function register($username, $password){
        if($this->userExists($username)){
            return "exists";
        }else{
            $randomSalt = $this->rand_string(20);
            $saltedPassword = hash('sha256', $password. $this->config['keys']['salt'] . $randomSalt);

            $sql = $this->db->prepare("INSERT INTO users (username, password, password_salt) VALUES (:username, :password, :password_salt)");
            $sql->execute(array(":username"=>$username, ":password" => $saltedPassword, ":password_salt" => $randomSalt));
            return true;
        }
    }

    public function userExists($identification){
        $query = "SELECT username FROM users WHERE username=:login";
        $sql = self::$dbh->prepare($query);
        $sql->execute(array(
            ":login" => $identification
        ));
        return $sql->rowCount() == 0 ? false : true;
    }

    /**
     * Generate a Random String
     */
    public function rand_string($length) {
        $random_str = "";
        $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars) - 1;
        for($i = 0;$i < $length;$i++) {
            $random_str .= $chars[rand(0, $size)];
        }
        return $random_str;
    }

    /**
     * Get all images
     */
    public function getAllImages(){
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get single image
     */

    public function getImage($image){
        $sql = "SELECT images.*, users.first_name, users.last_name, users.email
                FROM images
                LEFT JOIN users
                ON images.owner = users.id
                WHERE images.id=?
                ORDER BY date DESC";

        $query = $this->db->prepare($sql);
        $query->execute(array($image));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get images for user
     */

    public function getImagesForUser($user){
        $user_query = $this->db->prepare("SELECT id FROM users WHERE username=?");
        $user_query->execute(array($user));
        $usr = $user_query->fetch(PDO::FETCH_COLUMN);

        $stmt = $this->db->prepare("SELECT * FROM images WHERE owner=?");
        $stmt->execute(array($usr));
        return $stmt->fetch(PDO::FETCH_OBJ);

    }
}

