<form name="login" action="<?php echo base_url() ?>index.php/mail/addRole" method="POST" >
<?php
  if(isset($userRoles->roles)){
  	$first = 0;
   foreach($userRoles->roles as $role){
   	$selected= "";
   	if($first == 0){
   		$selected = "checked";
   		}
  ?>
   <p><input type="radio" name="role" value="<?php echo $role->id ?>" <?php echo $selected; ?>/><?php echo $role->practice->name ?></p>
  <?php $first = 1;} ?>

<p><input type="submit" value="Select Role"></p>
<?php } 
else{
	echo "<p>No roles assigned</p>";
	}
?>
</form>