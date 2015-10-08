
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<link href="<?= URL; ?>public/css/sepr_css.css" rel="stylesheet" type="text/css"/>

<form method="POST">
        <div class="logo"></div>
        <div class="login-block">
            <h1>Login</h1>
            <input type="text" value="" placeholder="Username" name="username" id="username"/>
            <input type="password" value="" placeholder="Password" name="password" id="password"/>
            <input type="submit" value="Login" name="submit"></input>
            <button onClick="register/">Register must redirect to register.php</button>
        </div>
</form>
