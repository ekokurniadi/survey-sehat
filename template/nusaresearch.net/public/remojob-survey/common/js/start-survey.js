$('#start_survey').submit(function() {
  	var myElem = document.getElementById('notifi_nologin');
	if (myElem === null){
		email = $("#emailEncode").val();
		window.location = "https://id.remojob.net/id/login-survey/?email="+email;
	}else{
        $("#notifi_nologin").stop(true,true).slideDown(300);
        $("#wrapper").addClass("blur_20");
	}
  	return false;
});