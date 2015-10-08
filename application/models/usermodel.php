<?php

class UserModel
{
    private $config = array(
      "keys" => array(
          "cookie" => "asf#@$!12^%%#%##ASfasfsad",
          "salt" => "s3c()rePr0gr4m!nG"
      ),
        "features" => array(
            "remember_me" => true,
        ),
        "cookies" => array(
            "expire" => "+30 days",
            "path" => "/",
            "domain" => "local.dev",
        )

    );

    private $db;
    private $isConnection = false;
    public $loggedIn = false;
    public $user = null;
    private $remember_cookie, $cookie, $session;

    function __construct($db=null)
    {
        session_start();

        try{
            $this->isConnection = true;
            if($db){
                $this->db = $db;
            }else{
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

                // generate a database connection, using the PDO connector
                // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
                $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
            }
            $this->cookie = isset($_COOKIE['sepr_login']) ? $_COOKIE['sepr_login'] : false;
            $this->session = isset($_SESSION['sepr_curuser']) ? $_SESSION['sepr_curuser'] : false;
            $this->remember_cookie = isset($_COOKIE['sepr_rememberMe']) ? $_COOKIE['sepr_rememberMe'] : false;

            $encUserID = hash("sha256", $this->config['keys']['cookie'] . $this->session . $this->config['keys']['cookie']);
            if($this->cookie == $encUserID){
                $this->loggedIn = true;
            }else{
                $this->loggedIn = false;
            }

            /**
             * If there is a Remember Me Cookie and the user is not logged in,
             * then log in the user with the ID in the remember cookie, if it
             * matches with the decrypted value in `logSyslogin` cookie
             */
            if($this->config['features']['remember_me'] === true && $this->remember_cookie !== false && $this->loggedIn === false){
                $encUserID = hash("sha256", $this->config['keys']['cookie']. $this->remember_cookie . $this->config['keys']['cookie']);
                if($this->cookie == $encUserID){
                    $this->loggedIn = true;
                }else{
                    $this->loggedIn = false;
                }

                if($this->loggedIn === true){
                    $_SESSION['sepr_curuser'] = $this->remember_cookie;
                    $this->session = $this->remember_cookie;
                }
            }

            $this->user = $this->session;

        }catch (\PDOException $e){
            exit("Exception initiation your database");
        }

    }

    public function login($username, $password, $remember_me = false, $cookies = true){
        if($this->isConnection == true) {
            $query = "SELECT username, password, password_salt FROM users WHERE username=:username";
            $sql = $this->db->prepare($query);
//            $sql->bindValue(":username", $username);
            $sql->execute(array(":username" => $username));

            if ($sql->rowCount() == 0) {
                print_r('here');

                return false;
            } else {

                $rows = $sql->fetch(PDO::FETCH_ASSOC);
                $user_name = $rows['username'];
                $user_pass = $rows['password'];
                $user_salt = $rows['password_salt'];
                $saltedPass = hash('sha256', $password . $this->config['keys']['salt'] . $user_salt);

            }

            if ($saltedPass == $user_pass || $password == "") {
                if ($cookies === true) {

                    $_SESSION['sepr_curuser'] = $user_name;
                    setcookie("sepr_login", hash("sha256", $this->config['keys']['cookie'] . $user_name . $this->config['keys']['cookie']), strtotime($this->config['cookies']['expire']));//, $this->config['cookies']['path'], $this->config['cookies']['domain']);

                    if ($remember_me === true && $this->config['features']['remember_me'] === true) {
                        setcookie("sepr_rememberMe", $user_name, strtotime($this->config['cookies']['expire'])); //, $this->config['cookies']['path'], $this->config['cookies']['domain']);
                    }
                    $this->loggedIn = true;
                    $_COOKIE['sepr_login'] = $this->config['keys']['cookie'] . $user_name . $this->config['keys']['cookie'];
                    $this->cookie = $this->config['keys']['cookie'] . $user_name . $this->config['keys']['cookie'];
                    // Redirect
                    $this->redirect("/sepr/user/");
                }
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function logout(){
        session_destroy();
        setcookie("sepr_login", "", time()-3600, $this->config['cookies']['path']);
        setcookie("sepr_rememberMe", "", time()-3600, $this->config['cookies']['path']);

        /**
         * Wait for the cookies to be removed, then redirect
         */
        usleep(2000);
        $this->redirect('/sepr/');
        return true;
    }

    /**
     * Do a redirect
     */
    public function redirect($url, $status = 302){
        header("Location: $url", true, $status);
        exit;
    }

    public function register($username, $password){
        if($this->userExists($username)){
            return false;
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
        $sql = $this->db->prepare($query);
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

    public function add_image_to_db($title, $image_name, $image_ext, $image_size, $can_comment, $owner){
        $stmt = "INSERT INTO images (title, file_name, ext, owner, can_comment, image_size) VALUES (?,?,?,?,?,?)";
        $status = $this->db->prepare($stmt);
        $status->execute(array($title, $image_name, $image_ext, $owner, $can_comment, $image_size));
        return $status;

    }

    public function getId(){
        $sql = "SELECT id FROM users WHERE username=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($this->user));
        return $query->fetch(PDO::FETCH_COLUMN);
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

