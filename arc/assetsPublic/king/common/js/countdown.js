jQuery(document).ready(function($) {
    var countdownTimer = setInterval(function(){ 
        $('.countdown').each(function() {
            var seconds = $(this).attr('data-time');
            if(seconds>=0){
                $(this).attr('data-time',seconds-1);

                var days        = Math.floor(seconds/24/60/60);
                var hoursLeft   = Math.floor((seconds) - (days*86400));
                var hours       = Math.floor(hoursLeft/3600);
                var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                var minutes     = Math.floor(minutesLeft/60);
                var remainingSeconds = seconds % 60;
                if (remainingSeconds < 10) {
                    remainingSeconds = "0" + remainingSeconds;
                }
                if(minutes<10){
                    minutes="0"+minutes;
                }
                $(this).html(hours+(24*days) + " : " + minutes + " : " + remainingSeconds);
                if (seconds <= 0) {
                    $(this).html("Finished!");
                } else {
                    seconds--;
                }
            }else{
                $(this).next(".btn_join").html('<a href="#">Hasil</a>');
                $(this).next(".btn_join").addClass('btn_result').removeClass('.btn_join');
            }
        });
    },1000);
    var countdownTimer = setInterval(function(){ 
        $('.countdown').each(function() {
            var seconds = $(this).attr('data-time');
            
        });
    },1000);
});