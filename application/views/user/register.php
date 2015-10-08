<?php

if(isset($_POST['submit'])){

    if($register_response){
        echo "<p class=\"alert alert-success\">You have successfully registered!</p>";
    }
    else if(!$register_response){
        echo "<p class=\"alert alert-danger\">Your registration was unsuccessful.</p>";
    }

}



?>

<div class="col-md-12 text-center">
<form method="POST">
    <label>Username / E-Mail</label><br/>
    <input name="username" type="text"/><br/>
    <label>Password</label><br/>
    <input name="password" type="password"/><br/>
    <label>
</label>
    <button name="submit">Register</button>
   </form>
</div>