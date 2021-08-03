
$( "#tabs" ).tabs({
  active: 2
});
// Popup show login
$(".show_popup").fancybox({
    'titlePosition': 'inside',
    'transitionIn': 'none',
    'transitionOut': 'none'
});
// Popup show choose submit
$(".choose_testimonial").fancybox({
    'titlePosition': 'inside',
    'transitionIn': 'none',
    'transitionOut': 'none'
});

// menu scroll down . It will fixed
$(document).scroll(function() {
    if($(this).scrollTop()>=100){
        $("#navi_top").addClass('active');
        $("#logo a img").attr('src', 'img/common/logo_active.png');
        $("#menu_top ul li.btn_home_submit a").addClass('active');
        $("#menu_top .menu_profile .menu_profile_right .first").addClass('active');
    }
    else{
        $("#navi_top").removeClass('active');
        $("#logo a img").attr('src', 'img/common/logo.png');
        $("#menu_top ul li.btn_home_submit a").removeClass('active');
        $("#menu_top .menu_profile .menu_profile_right .first").removeClass('active');
    }
});

// shadow will display when click button share
$(".btn_share").live('click', function() {
    event.preventDefault();
    next = $(this).parent().next();
    next.addClass('active');
});

$(document).mouseup(function(event) {
    $('.box_share').removeClass('active');
});

// fix-height image
$(".left_detail").each(function(index, el) {
    height = $(this).height();
    img = $(this).children('img');
    img_height = $(this).children('img').height();
    space = (height-img_height)/2;
    //$(img).css('margin-top', space+"px");

});

// Member should login before comment
function alert_Login(){
    alert("Please Login");
}

// Form upload
file = $("#url_image");
$("#btn_upload").bind('click',function(event) {
    event.preventDefault();
    file.click();
});
file.change(function(event) {
    $("#text_file").prop('value',$(this).val());
});

$(".btn_like.active").live('click', function(event) {
     event.preventDefault();
    btn_click = $(this);
    number = btn_click.children('span');
    img = ($(this).children('img'));

    $.ajax({
            url: '/public/testimonial/UpdateLike.php',
            type: 'POST',
            dataType: 'html',
            data: {Id: $(this).attr('rel'), UserId : $("#UserId").val()},
        })
        .done(function(data) {
            if(data!="false"){
                number.text(data);
                if(img.attr('src') == "img/common/icon_01_active.png"){
                    img.attr('src','img/common/icon_01.png');
                }else{
                    img.attr('src',"img/common/icon_01_active.png");
                }

            }
        })
});


// Index
$('#home .tabs_timeline').live('click', function(event) {
    event.preventDefault();
    month = $(this).attr('rel');
    year = $(this).attr('href');
    parent_tabs = $(this).parents('#timeline_months').parent();
    parent_tabs_id = parent_tabs.attr('id');
    $("#"+parent_tabs_id+" #timeline_months li").each(function() {
        $(this).removeClass('active');
    });
    $(this).parent().addClass('active');

    $.ajax({
        url: '/public/testimonial/GetContentFLMonth.php',
        type: 'POST',
        dataType: 'html',
        data: {m: month,y: year},
    })
    .done(function(data) {
        $("#"+parent_tabs_id+" .change_content").empty();
        $("#"+parent_tabs_id+" .change_content").append(data);
    });
});


$("#home .js_paging").live('click',  function(event) {
    event.preventDefault();
    content_pagination  = $(this).parents('div.change_content');
    page_choose = $(this).attr('rel');

    timeline_navi  = content_pagination.prev().prev();
    month_active = timeline_navi.find('.active');
    month_present = month_active.children().attr('rel');
    year_present = month_active.children().attr('href');

    $.ajax({
        url: '/public/testimonial/GetContentPgMonth.php',
        type: 'GET',
        dataType: 'html',
        data: {m: month_present,y:year_present,page : page_choose},
    })
    .done(function(data) {
        content_pagination.empty();
        content_pagination.append(data);
    });
});

// Reward Proof

$('#reward_proof .tabs_timeline').live('click', function(event) {
    event.preventDefault();
    month = $(this).attr('rel');
    year = $(this).attr('href');
    parent_tabs = $(this).parents('#timeline_months').parent();
    parent_tabs_id = parent_tabs.attr('id');
    $("#"+parent_tabs_id+" #timeline_months li").each(function() {
        $(this).removeClass('active');
    });
    $(this).parent().addClass('active');

    $.ajax({
        url: '/public/testimonial/GetContentFLMonth_2.php',
        type: 'POST',
        dataType: 'html',
        data: {m: month,y: year},
    })
    .done(function(data) {
        $("#"+parent_tabs_id+" .change_content").empty();
        $("#"+parent_tabs_id+" .change_content").append(data);
    });
});

$("#reward_proof .js_paging").live('click',  function(event) {
    event.preventDefault();
    content_pagination  = $(this).parents('div.change_content');
    page_choose = $(this).attr('rel');

    timeline_navi  = content_pagination.prev().prev();
    month_active = timeline_navi.find('.active');
    month_present = month_active.children().attr('rel');
    year_present = month_active.children().attr('href');

    $.ajax({
        url: '/public/testimonial/GetContentPgMonth_2.php',
        type: 'GET',
        dataType: 'html',
        data: {m: month_present,y:year_present,page : page_choose},
    })
    .done(function(data) {
        content_pagination.empty();
        content_pagination.append(data);
    });
});

$(".fancybox").fancybox();


$(document).on('click', '.fancybox', function(event) {
    event.preventDefault();
    $(this).fancybox();
});
