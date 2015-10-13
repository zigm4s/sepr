<?php

$mysql_connection = mysql_connect("127.0.0.1", "sepr", "secure");
$mysql = mysql_selectdb("sepr", $mysql_connection);



if(isset($_POST['submit'])){
    if(!$mysql){
        exit("No connection to database");
    }
    if($register_response){
        echo "<p class=\"alert alert-success\">You have successfully registered!</p>";
    }
    else if(!$register_response){
        echo "<p class=\"alert alert-danger\">Your registration was unsuccessful.</p>";
    }
}
?>
<link href="<?= URL; ?>public/css/sepr_css.css" rel="stylesheet" type="text/css"/>

<form method="POST">
    <div class="logo"></div>
    <div class="login-block">
    <input type="text" name="firstname" placeholder="Firstname"/>
    <input type="text" name="lastname" placeholder="Lastname"/>
    <input type="email" name="email" placeholder="Email"/>
    <input type="text" name="username" placeholder="Username"/>
    <input type="password" name="password" placeholder="Password"/>
    <input type="submit" name="submit" value="Register Me"/>
    </div>
</form>

