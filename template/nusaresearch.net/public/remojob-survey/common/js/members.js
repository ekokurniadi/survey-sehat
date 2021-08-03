jQuery(document).ready(function($) {
	updateList();
});
$("#search-number").keyup(function (e) {
    if (e.keyCode == 13) {
        numberlucky = $("#search-number").val();
        tbResults = $("#tbResults");
	    tbResults.html("");
        if(numberlucky != "" && numberlucky != 0){
			$.ajax({
				url: 'https://id.remojob.net/service/ajaxListMemberSurvey',
				type: 'POST',
				dataType: 'json',
				data: {numberlucky: numberlucky},
			})
			.done(function(data) {
				if(data.error == 0){
					jQuery.each( data.data, function( i, val ) {
						no = i+1;
						tbResults.append("<tr class=\"search-result\">\
	                                    <td>"+no+"</td>\
	                                    <td>"+val[0]+"</td>\
	                                    <td>"+val[1]+"</td>\
	                                </tr>");
					});
				}
			})
		}else{
			updateList();
		}
    }
});
function updateList() {
	userid = $("#userid").val();
	tbResults = $("#tbResults");
	$.ajax({
		url: 'https://id.remojob.net/service/ajaxListMemberSurvey',
		type: 'POST',
		dataType: 'json',
		data: {userid: userid},
	})
	.done(function(data) {
		console.log(data);
		if(data.error == 0){
			jQuery.each(data.data, function( i, val ) {
				no = i+1;
			  	if(i != 10){
					tbResults.append("<tr>\
                                    <td>"+no+"</td>\
                                    <td>"+val[0]+"</td>\
                                    <td>"+val[1]+"</td>\
                                </tr>");
				}else{
					tbResults.append("<tr><td colspan=\"3\"></td></tr><tr class=\"current\">\
                                    <td>"+no+"</td>\
                                    <td>"+val[0]+"</td>\
                                    <td>"+val[1]+"</td>\
                                </tr>");
				}
			});
		}
	})
}