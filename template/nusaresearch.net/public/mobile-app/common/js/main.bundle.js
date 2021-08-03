"use strict";

$(window).on("load", function () {
    hideLoader();
    loadSpinDetection();
    activeScrollSpy();
    parallaxActive();
    msieversion();
});

function hideLoader() {
    var loadingEle = document.getElementsByClassName("loading-wrapper")[0];

    loadingEle.parentNode.removeChild(loadingEle, function () {
        loadingEle.opacity = 0;
    });
}

function loadSpinDetection() {
    var wrapperEle;
    var rotateEle;
    var p1;

    $("#point-exchange, #app-download").on("mousemove", function (e) {
        if (screen.width < 768) {
            $(rotateEle).addClass("auto-rotate");
            e.preventDefault();
            return;
        }

        var p2 = { x: e.pageX, y: e.pageY };

        var offsetDeg = -45;
        var rotateDeg = angleDeg(p1, p2) + offsetDeg;

        rotateEle.style.transform = "rotate(" + rotateDeg + "deg)";

        $(rotateEle).removeClass("auto-rotate");
        //- e.preventDefault();
    });

    $("#point-exchange, #app-download").on("mouseenter", function (e) {
        wrapperEle = document.getElementById("section-04");
        rotateEle = document.getElementsByClassName("logo-animate")[0];
        p1 = {
            x: rotateEle.offsetLeft + rotateEle.offsetWidth / 2,
            y: rotateEle.offsetTop + rotateEle.offsetHeight / 2
        };
    });

    $("#point-exchange, #app-download").on("mouseout", function (e) {
        //- rotateEle.removeAttribute("style");

        $(rotateEle).addClass("auto-rotate");
        //- e.preventDefault();
    });
}

function angleRadians() {
    var p1 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { x: 0, y: 0 };
    var p2 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : { x: 0, y: 0 };

    return Math.atan2(p2.y - p1.y, p2.x - p1.x);
}

function angleDeg() {
    var p1 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { x: 0, y: 0 };
    var p2 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : { x: 0, y: 0 };

    return Math.atan2(p2.y - p1.y, p2.x - p1.x) * 180 / Math.PI;
}

function activeScrollSpy() {
    $("body").scrollspy({ target: "#navbars" });
}

function parallaxActive() {
    var offset = 100;
    var body = document.getElementsByTagName("body")[0];
    body.scrollLength = body.scrollHeight - body.clientHeight;

    var parallaxEls = document.getElementsByClassName("background-content");

    for (var i = 0; i < parallaxEls.length; i++) {
        var parallaxEl = parallaxEls[i];
        parallaxEl.style.backgroundSize = "calc(100% + " + offset * 2 + "px)";

        if (screen.availWidth < 768) {
            parallaxEl.style.backgroundSize = "auto calc(100% + " + offset * 2 + "px)";
        }
    }

    document.addEventListener("scroll", function (e) {
        for (var i = 0; i < parallaxEls.length; i++) {
            parallaxEl = parallaxEls[i];

            if (body.scrollTop < parallaxEls[i].offsetTop + parallaxEls[i].offsetHeight && body.scrollTop + screen.availHeight > parallaxEls[i].offsetTop) {
                var newPosition = (body.scrollTop + screen.availHeight / 2 - parallaxEls[i].offsetTop - parallaxEls[i].clientHeight / 2) / parallaxEls[i].clientHeight * offset;

                parallaxEls[i].style.backgroundPositionY = "calc(50% + " + newPosition + "px)";
            }
        }
    });
}

function msieversion() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        // If Internet Explorer, return version number
        console.log(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))));
        alert("Please use another browser to get the better interface.");
    } // If another browser, return 0

    return false;
}
