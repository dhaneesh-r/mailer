<form name="login" action="<?php echo base_url() ?>index.php/mail/addRole" method="POST" >

  <?php
   foreach($userRoles->roles as $role){
  ?>
   <input type="radio" name="role" value="<?php echo $role->id ?>" /><?php echo $role->role_name ?>
  <?php } ?>

<input type="submit" value="Send mail" /> 

</form>