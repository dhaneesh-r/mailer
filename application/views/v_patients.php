<form name="login" action="<?php echo base_url() ?>index.php/mail/sendMail" method="POST" >

  <select class="multiselect" multiple="multiple" name="patients[]">
            <?php foreach($patients->patients as $patient)  {
         	if(isset($patient->primary_email) && $patient->primary_email != ""){
         	?>
             <option value="<?php echo $patient->name, '||', $patient->primary_email; ?>"><?php echo $patient->primary_email; ?></option>
         <?php 
         }
         } ?>      
        
      </select>
 
<textarea name="sms" id="sms" rows="5" cols="50"></textarea>

<input type="submit" value="Send mail" /> 

</form>