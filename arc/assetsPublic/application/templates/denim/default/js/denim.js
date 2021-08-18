$(function() {
	 $('#btn_submit_photo, .btn_submit_photo').bind("click",function(event){
		alert("Mohon login terlebih dahulu sebelum mengirim foto!");
		event.preventDefault();
	 });
});
$(function() {
	 $('#inpage_pagebot_btn').bind("click",function(event){
		alert("Mohon login terlebih dahulu sebelum mengirim foto!");
		event.preventDefault();
	 });
});
function doVote(id,new_img){
	alert("Mohon login dahulu sebelum memberikan voting");
}
function request(){
   
		
}
var openPOPTK = function(){
  var $popup = $('#tk_popup');
  var $overlay = $popup.find('#tk_popup_over');
  var $main = $popup.find('#tk_popup_main');
  var $closeBtn = $popup.find('#tk_popup_close_btn');
  var wh = $(window).height();
  var ww = $(window).width();
  var flag = true;

  function setPos(){
    $main.css({
      left : (ww - 444) / 2,
      top : (wh - 172) / 2
    });
  }

  setPos();
  $popup.css('display', 'block');

  $closeBtn.on('click', function(){
    $popup.css('display', 'none');
    flag = false;
    document.location = "../index-2.html";
  });

  $overlay.on('click', function(){
    $closeBtn.trigger('click');
  });

  $(window).on('resize', function(){
    if(flag){
      wh = $(window).height();
      ww = $(window).width();
      setPos();
    }
  });

} 

   