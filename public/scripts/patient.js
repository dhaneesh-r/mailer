$(".patients").removeAttr('checked');
$(".patients").click(function(){
 	if($(this).is(':checked')){
      var val = $(this).attr("value");
		var id = $(this).attr("id").split("_")[1];
      var infoArr = val.split("||");
      var patientName = infoArr[0];
      var email = infoArr[1];
      var closeLink = '<a href="javascript:void(0)" class="close">x</a>';
      var html = "<span class='selected-block' id='"+id+"'>"+patientName + closeLink +"</span>";     
      $(".selected-patients").append(html);
 		}else{
 			var id = $(this).attr("id").split("_")[1];
 			$('#'+id).remove();
 			}
 	
 });
$(".close").live("click",function(){
	var id = $(this).parent().attr('id');
	$('#list_'+id).removeAttr('checked');
	$(this).parent().remove();
 });