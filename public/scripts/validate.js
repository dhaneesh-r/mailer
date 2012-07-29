function validate(){
	var error = 0;
	if(!$(".patients").is(':checked')){
		error = 1;
		$(".patientSel").html("please select patients");
		$(".patientSel").show();
	}
	var sub = $(".subject").val();
	if(sub == ""){
		error = 1;
		$(".sub").html("please enter subject");
		$(".sub").show();
		}
var mess = $(".message").val();
	if(mess == ""){
		error = 1;
		$(".mess").html("please enter subject");
		$(".mess").show();
		}
	if(error != 0){
		return false;
	}
}