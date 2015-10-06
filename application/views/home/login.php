<?php
//$LS->init();
if(isset($_POST['act_login'])){
 $user=$_POST['login'];
 $pass=$_POST['pass'];
 if($user=="" || $pass==""){
  $msg = $arrayName = array('0' => 'Error', '1' => 'Empty fields are not allowed.');
 }else{
  if(!$LS->login($user, $pass)){
   $msg = $arrayName = array('0' => 'Error', '1' => 'Invalid data entered.');
  }
  elseif($LS->login($user,$pass)){
  	$LS->redirect(URL . "occasions/index/1");
  }
 }
}
?>
<div id="content">
   <h1>Log In</h1>
   <form action="login" method="POST" style="margin:0px auto;display:table;">
    <label>Username / E-Mail</label><br/>
    <input name="login" type="text"/><br/>
    <label>Password</label><br/>
    <input name="pass" type="password"/><br/>
    <label>
     <input type="checkbox" name="remember_me"/> Remember Me
    </label>
    <div clear></div>
    <button class="btn btn-success" style="width:100%;" name="act_login">Log In</button>
   </form>
   <style>input[type=text], input[type=password]{width: 230px;}</style>
   <?php
   if(isset($msg)){
    echo $msg[0]."<br/>".$msg[1];
   }
   ?>
  </div>