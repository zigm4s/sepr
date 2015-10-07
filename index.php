<?php
require_once("PHP_MODULES/CLASSES/Users.php");
require_once("PHP_MODULES/CLASSES/Images.php");

class Application {

    public $users, $images;

    protected $pdo;

    function __construct(){
        $this->pdo = new PDO('mysql:dbname=sepr', 'root', '');
        $this->users = new Users($this->pdo);
        $this->images = new Images($this->pdo);
    }

    /**
     * @return Images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return Users
     */
    public function getUsers()
    {
        return $this->users;
    }


}

include_once ('PHP_MODULES/log_inc.php');
include ('PHP_MODULES/setIndexPage.php');
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
include_once ('PHP_MODULES/cookie.php');
include_once ('PHP_MODULES/menuContent_inc.php');
//require_once('PHP_MODULES/Users.php');
//$users = new Users($pdo);
//print_r($users->return_all());

$app = new Application();
//
//print_r($app->getUsers()->return_all());
//echo "<br />";
//print_r($app->getUsers()->findByEmail("zigmas@localhost"));
print_r($app->getImages()->return_for_user($app->getUsers()->findByEmail("zigmas@localhost")));

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Piirissare webpage</title>
<link href="index.css" type="text/css" rel="stylesheet" />
<style>
.error { color: white; padding: 0.2em; }

</style>


</head>
<body>
<link href="index.css" type="text/css" rel="stylesheet" />
<div class ="Bodyplus">
	<div class="Top">
		<div class="Navigation">
                        <div class ="HeadButtons">
                        <a href='sign_Up.php'>Sign Up</a>
                        <?php if (empty($_SESSION["username"])) {
                                   echo "<a href='sign_In.php'>Sign In</a>";   
                                   }else{
                                       echo "<a href='sign_In.php'>Logout</a>";   
                                   }
                            ?>
                    </div>
			<div class="navbar">
				<div class="holder">
					<ul>
                                            <?php displayMainmenu(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
		
	<div class="Middle">
		<div class="Submenu">
                    
                    <ul>
                        <?php displaySubmenu() ?>
                        
                    </ul>

		</div>
            <div class="Content">

                    <?php 
                    subMenuSwitch(); 
                    ?>
            </div>
	</div>	
	<div class="Footer">
		<div class="Contact">aleksei.shashin@gmail.com &copy;me
		</div>
	</div>
</div>
</body>
</html>
