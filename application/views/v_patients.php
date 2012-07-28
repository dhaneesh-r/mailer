<link rel="stylesheet" href="<?php echo base_url() ?>public/multi-select/css/common.css" type="text/css" />
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
	<link type="text/css" href="<?php echo base_url() ?>public/multi-select/css/ui.multiselect.css" rel="stylesheet" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/multi-select/js/plugins/localisation/jquery.localisation-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/multi-select/js/plugins/scrollTo/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/multi-select/js/ui.multiselect.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".multiselect").multiselect();
		});
	</script>

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
 
<textarea name="mailText" id="mailText" rows="5" cols="50"></textarea>

<input type="submit" value="Send mail" /> 

</form>