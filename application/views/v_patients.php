<form name="login" action="<?php echo base_url() ?>index.php/mail/sendMail" method="POST" onsubmit="return validate()">
<?php if(isset($patients->patients) && count($patients->patients) > 0){?>
	
  <div class="patients-name">
  <p class="patientSel error" style="display:none"> </p>
            <?php $count = 0;foreach($patients->patients as $patient)  {
         	if(isset($patient->primary_email) && $patient->primary_email != ""){
         	?>
         	<p>
         	<input type="checkbox" class="patients" name="patients[]" id="list_<?php echo $count ?>" value="<?php echo $patient->name, '||', $patient->primary_email; ?>" /><?php echo $patient->name; ?>
         	</p> 
             <?php
             $count++;
         }
         } ?>      
        
  </div>
  <div class="selected-patients">
  </div>
<div class="mail-info">
<p>Subject: <input type="text" name="subject" value="" class="subject" /></P>
<p class="sub error" style="display:none"> </p>
<p>Message: <textarea name="mailText" id="mailText" rows="5" cols="50" class="message"></textarea></P>
<p class="mess error" style="display:none"> </p>
</div>
<input type="submit" value="Send mail">
<?php } else{
 echo "<p>No patients</p>";
 } ?>
</form>
<script type="text/javascript" src="<?php echo base_url() ?>public/scripts/patient.js"  ></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/scripts/validate.js"  ></script>