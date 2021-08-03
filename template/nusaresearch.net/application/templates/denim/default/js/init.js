(function ($) {
  /* ------------------------------- */
  $(function(){
    load_event();
    /*slidescroll*/
    $("a[href*='#']").slideScroll();

    hoverOpacityBtn();
    if($('div').is('#top_contents')){
      effectDaftarBtn();
    }
    fixFooter();
    checkURL();
  });
})(jQuery);

/*image rollover*/
var load_event = function(){
  $('a>img[src*="-out-"],input[src*="-out-"]').each(function(){
    var $$ = $(this);
    $$.mouseover(function(){ $(this).attr('src', $(this).attr('src').replace(/-out-/,'-on-')) });
    $$.mouseout (function(){
      if ( $(this).attr('wws') != 'current' ) { $(this).attr('src', $(this).attr('src').replace(/-on-/,'-out-')) }
    });
  });

  // $('a[subwin]').die('click').click(subwin_func);

}

/*sub window*/
var subwin_func = function () {
  var $$ = $(this);
  var param = $$.attr('subwin').split(/\D+/);
  var w = param[0] || 300;
  var h = param[1] || 300;
  var s = ($$.attr('subwin').match(/slim/))?'no':'yes';
  var r = ($$.attr('subwin').match(/fix/) )?'no':'yes';
  var t = $$.attr('target') || '_blank' ;
  window.open( $$.attr('href'), t, "resizable="+r+",scrollbars="+s+",width="+w+",height="+h ).focus();
  return false;
}

/* hover opacity */
var hoverOpacityBtn = function(){
  var $btnHover = $('.btn_hover');
  $btnHover.hover(function(){
    $(this).stop(true, true).animate({
      opacity: 0.7
    },700);
  }, function(){
    $(this).stop(true, true).animate({
      opacity: 1
    },700);
  });
}

var fixFooter = function(){
  var $footetBot = $('#footer_bot');
  var wrapperHeight = $('#wrapper').height();
  var wh = $(window).height();

  function setPadding(){
    if(wrapperHeight < wh){
      var calP = (wh - wrapperHeight) + 15;
      $footetBot.css({
         'padding-bottom' : calP
      });
    }else{
      $footetBot.css({
         'padding-bottom' : 15
      });
    }
  }
  setPadding();

  $(window).resize(function(){
    wh = $(window).height();
    setPadding();
  });
}

var effectDaftarBtn = function(){
  $btn = $('#top_daftar_btn');
  var plus = 4;
  $btn.hover(function(){
    $(this).find('img:first').stop(true, true).animate({
      width: 187 + plus,
      height: 181 + plus,
      top: -(plus/2),
      left: -(plus/2)
    },500);
  }, function(){
    $(this).find('img:first').stop(true, true).animate({
      width: 187,
      height: 181,
      top: 0,
      left: 0
    },500);
  });
}

var checkURL = function(){
  var href = window.location.href;
  var $inpageFollowUs = $('#inpage_follow_us');
  var $leftMenu = $('#left_sidebar li');

  if(href.search("about-contest") != -1){
    $inpageFollowUs.css('display', 'block');
    $leftMenu.eq(1).addClass('act');
  }else if(href.search("how-to-join") != -1){
    $inpageFollowUs.css('display', 'block');
    $leftMenu.eq(2).addClass('act');
  }else if(href.search("submit-photo") != -1){
    $inpageFollowUs.css('display', 'block');
    $leftMenu.eq(3).addClass('act');
  }
}


