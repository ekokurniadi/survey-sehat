function showPopup() {
    setTimeout(function() {
        $('.popup_intro').addClass('show');
    }, 500)
    $('.btnClose,.popup_intro').on('click', function(event) {

        /* Act on the event */
        $('.popup_intro').removeClass('show');
        notShowAgain(1);
    });
    $('.prevent_popup').on('click', function(event) {

        /* Act on the event */
        notShowAgain(90);
        $('.popup_intro').removeClass('show');
    });
    $('.popup_intro div').on('click', function(event) {
        event.stopPropagation();
    });

}

function notShowAgain(expireDay) {
    var expiredMS = expireDay * 86400000; // (milisecond)
    var object = {value: "true", timestamp: new Date().getTime() + expiredMS}
    localStorage.setItem("appPromotion", JSON.stringify(object));
}

function checkValidSession() {
    if (localStorage.getItem("appPromotion") === null) {
        return false;
    }
    var object = JSON.parse(localStorage.getItem("appPromotion")),
    dateString = object.timestamp,
    now = new Date().getTime().toString();
    var compareTime = dateString - now;
    return object.value == 'true' && compareTime > 0;
}

$(window).load(function() {
    setTimeout(function() {
        $('.popup_count').addClass('show');
    }, 500);

    $('.btnClose,.popup_count').on('click', function(event) {
        /* Act on the event */
        $('.popup_count').removeClass('show');
    });

    if(!checkValidSession()) { showPopup(); }
});