$(document).ready(function() {

	$('#list_mem .inner').mousemove(function(e) {

		var s_top = parseInt($('#list_mem .inner').offset().top);

		var s_bottom = parseInt($('#list_mem .inner').height() + s_top);

		var mheight = parseInt($('#list_mem .inner dd').height() * $('#list_mem .inner dd').length);

		var top_value = Math.round(( (s_top - e.pageY) /100) * mheight / 2);

		$('#list_mem .inner dl').animate({top: top_value}, { queue:false, duration:500});

	});

	/*$('#list_10mem .inner').mousemove(function(e) {

		var s_top = parseInt($('#list_10mem .inner').offset().top);

		var s_bottom = parseInt($('#list_10mem .inner').height() + s_top);

		var mheight = parseInt($('#list_10mem .inner dd').height() * $('#list_10mem .inner dd').length);

		var top_value = Math.round(( (s_top - e.pageY) /100) * mheight / 2);

		$('#list_10mem .inner dl').animate({top: top_value}, { queue:false, duration:500});

	});*/
});
/*
http://api.jquery.com/scripts/events.js
*/
(function($) {
  $.print = function( message, insertType ) {
    insertType = insertType || "append";
    if ( typeof(message) == "object" ) {
      var string = "{<br>",
          values = [],
          counter = 0;
      $.each( message, function( key, value ) {
        if ( value && value.nodeName ) {
          var domnode = "&lt;" + value.nodeName.toLowerCase();
          domnode += value.className ? " class='" + value.className + "'" : "";
          domnode += value.id ? " id='" + value.id + "'" : "";
          domnode += "&gt;";
          value = domnode;
        }
        values[counter++] = key + ": " + value;
      });
      string += values.join( ",<br>" );
      string += "<br>}";
      message = string;
    }

    var $output = $( "#print-output" );

    if ( !$output.length ) {
      $output = $( "<div id='print-output' />" ).appendTo( "body" );
    }

    var newMsg = $('<div />', {
      "class": "print-output-line",
      html: message
    });

    $output[insertType]( newMsg );
  };
})(jQuery);

