/*---------------------------------------------------------------

 jQuery.slideScroll.js

 jQuery required (tested on version 1.2.6)
 encoding UTF-8

 Copyright (c) 2008 nori (norimania@gmail.com)
 http://moto-mono.net
 Licensed under the MIT

 $Update: 2008-12-24 20:00
 $Date: 2008-12-22 23:30

 ----------------------------------------------------------------*/

$.fn.slideScroll = function(options){

  var c = $.extend({
    interval: 20, // 変化はあんまりないかも
    easing: 0.6, // 0.4 ~ 2.0 くらいまで
    comeLink: false
  },options);
  var d = document;

  // timerとposのscopeを$.fn.slideScroll内に限定する
  var timer;
  var pos;

  // スクロール開始時の始点を得る
  function currentPoint(){
    var current = {
      x: d.body.scrollLeft || d.documentElement.scrollLeft,
      y: d.body.scrollTop || d.documentElement.scrollTop
    }
    return current;
  }

  // 現在のウィンドウサイズとターゲット位置から最終到達地点を決める
  function setPoint(){

    // 表示部分の高さと幅を得る
    var h = d.documentElement.clientHeight;
    var w = d.documentElement.clientWidth;

    // ドキュメントの最大の高さと幅を得る
    var maxH = d.documentElement.scrollHeight;
    var maxW = d.documentElement.scrollWidth;

    // ターゲットの位置が maxH(W)-h(w) < target < maxH(W) なら スクロール先をmaxH(W)-h(w)にする
    pos.top = ((maxH-h)<pos.top && pos.top<maxH) ? maxH-h : pos.top;
    pos.left = ((maxW-w)<pos.left && pos.left<maxW) ? maxW-w : pos.left;
  }

  // 次のスクロール地点を決める
  function nextPoint(){
    var x = currentPoint().x;
    var y = currentPoint().y;
    var sx = Math.ceil((x - pos.left)/(5*c.easing));
    var sy = Math.ceil((y - pos.top)/(5*c.easing));
    var next = {
      x: x - sx,
      y: y - sy,
      ax: sx,
      ay: sy
    }
    return next;
  }

  // 到達地点に近づくまでスクロールを繰り返す
  function scroll(href){
    var movedHash = href;
    timer = setInterval(function(){
      nextPoint();

      // 到達地点に近づいていたらスクロールをやめる
      if(Math.abs(nextPoint().ax)<1 && Math.abs(nextPoint().ay)<1){
        clearInterval(timer);
        window.scroll(pos.left,pos.top);
        location.href = movedHash;
      }
      window.scroll(nextPoint().x,nextPoint().y);
    },c.interval);
  }

  // URIにhashがある場合はスクロールする
  function comeLink(){
    if(location.hash){
      if($(location.hash) && $(location.hash).length>0){
        pos = $(location.hash).offset();
        setPoint();
        window.scroll(0,0);
        if($.browser.msie){
          setTimeout(function(){
            scroll(location.hash);
          },50);
        }else{
          scroll(location.hash);
        }
      }
    }
  }
  if(c.comeLink) comeLink();

  // アンカーにclickイベントを定義する
  $(this).each(function(){
//不要文字削除
    var href_1 = this.href.replace('?','');
    var href_2 = location.href.split("#")[0].replace('?','');
    if(this.hash && $(this.hash).length>0 && href_1.match(href_2)){
      var hash = this.hash;
      $(this).click(function(){

        // ターゲットのoffsetを得る
        pos = $(hash).offset();

        // スクロール中ならスクロールをやめる
        clearInterval(timer);

        // 到達地点を決めてスクロールを開始する
        setPoint();
        scroll(this.href);
        return false;
      });
    }
  });
}


