<div class="login-box">
<?php
  if(isset($error) && $error !=""){
  	echo "<p class='error'>$error</p>";
  	}
?>
<form name="login" action="<?php echo base_url() ?>index.php/login/authenticate" method="POST" >
<p><label>Username:</label><input type="text" name="username" id="username" /></p>
<p><label>Password:</label><input type="password" name="password" id="password" /></p>
<p><input type="submit" value="sign in" /></p>
</form>
</div>