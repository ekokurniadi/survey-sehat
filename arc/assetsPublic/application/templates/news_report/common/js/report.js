// JavaScript Document
$(function(){
    //JS for animation
    $("#report .request_box #request_ttl").click(function(e) {
        $("#report .request_box .report_form").slideToggle(500);
        $(this).toggleClass("title_show");
    });

    $("#report #topic_ttl").click(function(e) {
        $("#report #report_menu").slideToggle(500);
        $(this).toggleClass("title_show");
    });

    $("#report #report_ttl").click(function(e) {
        $("#report #report_tabs").slideToggle(500);
        $(this).toggleClass("title_show");
    });

    $("#link_close").click(function(e) {
        $("#report_popup").hide();
    });

    $("#link_send").click(function(e) {
        var p = $('.request_box #request_ttl').offset().top;
        $("#report_popup").hide();
        $("#report .request_box .report_form").show(500);
        $("#report .request_box #request_ttl").toggleClass("title_show");

        $('html,body').animate({ scrollTop: p }, "slow", "easeInOutCirc");
    });

    $( "#report_submit" ).on( "click", function( event ) {
        ajaxReportRequest();
    });

})
//JS for server-side
function ajaxRating(newsId, rate) {
    $.ajax({
        type: "POST",
        url: "/public/news/index/ajax-rating",
        data:{'newsId':newsId, 'rate':rate},
        success: function(data) {
            alert(data['mess']);
        }
    });
}

function ajaxReportRequest() {
    // $.ajax({
    //     type: "POST",
    //     url: "/public/news/index/ajax-research-request",
    //     data:{'data':$("#formRequest").serialize()},
    //     success: function(data) {
    //         alert(data['mess']);
    //         if (data['error'])
    //             location.reload();
    //     }
    // });


    $("#dialog-confirm").dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Permintaan": function () {
                $.ajax({
                    type: "POST",
                    url: "/public/news/index/ajax-research-request",
                    data: { 'data': $("#formRequest").serialize() },
                    success: function (data) {
                        if (data['error'] == false) {
                            $("#dialog").dialog({
                                width: 400,
                                buttons: {
                                    "Tutup": function () {
                                        location.reload();
                                    }
                                }
                            })
                            .prev(".ui-dialog-titlebar")
                            .css("background", "#f57b20")
                            .css("color", "white");
                        }else {
                            $("#dialog-error").dialog({
                                width: 400,
                                buttons: {
                                    "Tutup": function () {
                                        $(this).dialog("close");
                                    }
                                }
                            })
                            .prev(".ui-dialog-titlebar")
                            .css("background", "#f57b20")
                            .css("color", "white");
                        }
                    }
                });
                $(this).dialog("close");
            },
            "Tutup": function () {
                $(this).dialog("close");
            }
        }
    }).prev(".ui-dialog-titlebar").css("background", "#f57b20").css("color", "white");

}
