(function(){
  var s = document.getElementsByTagName("script");
  var d = s[s.length-1].src.substring(0, s[s.length-1].src.lastIndexOf("https://nusaresearch.net/")+1);
  if(!browserDistinction()){
    d = URLdecode( d );
  }
  for(var i=0; i<arguments.length; i++){
    document.write(unescape('%3Cscript type="text/javascript" src="'+d+arguments[i]+'" charset="utf-8"%3E%3C/script%3E'));
  }
})(
  //ここにインポートのjsファイルを追加
  'jquery-1.7.2.min.html',
  'jquery.easing.1.3.html',
  'heightLine.html',
  'init.html',
  'jqueryui.html'
);

//URLdecode ※以下は触らないで下さい。
function URLdecode(_dat){
  _dat = _dat.replace(/\+/g, "\x20");
  _dat = _dat.replace( /%([a-fA-F0-9][a-fA-F0-9])/g,
      function(_tmp, _hex){ return String.fromCharCode( parseInt(_hex, 16) ) } );
  return packChar( this.toUTF16( this.unpackUTF16(_dat) ) );
}
function packChar(_utf16){
  var i, str = "";
  for (i in _utf16) str += String.fromCharCode(_utf16[i]);
  return str;
}
function toUTF16(_utf8){
  var utf16 = [];
  var idx = 0;
  var i,s;
  for (i=0; i<_utf8.length; i++, idx++)
  {
    if (_utf8[i] <= 0x7f) utf16[idx] = _utf8[i];
    else
    {
      if ( (_utf8[i]>>5) == 0x6)
      {
        utf16[idx] = ( (_utf8[i] & 0x1f) << 6 )
               | ( _utf8[++i] & 0x3f );
      }
      else if ( (_utf8[i]>>4) == 0xe)
      {
        utf16[idx] = ( (_utf8[i] & 0xf) << 12 )
               | ( (_utf8[++i] & 0x3f) << 6 )
               | ( _utf8[++i] & 0x3f );
      }
      else
      {
        s = 1;
        while (_utf8[i] & (0x20 >>> s) ) s++;
        utf16[idx] = _utf8[i] & (0x1f >>> s);
        while (s-->=0) utf16[idx] = (utf16[idx] << 6) ^ (_utf8[++i] & 0x3f);
      }
    }
  }
  return utf16;
}
function unpackUTF16(_str){
  var i, utf16=[];
  for (i=0; i<_str.length; i++) utf16[i] = _str.charCodeAt(i);
  return utf16;
}

//ユーザーエージェント判別　新規ブラウザはココに追加
function browserDistinction(){
  if(navigator.userAgent.indexOf("Opera") != -1){ return true; }
  else if(navigator.userAgent.indexOf("MSIE") != -1){ return true; }
  else if(navigator.userAgent.indexOf("Firefox") != -1){ return false; }
/*  else if(navigator.userAgent.indexOf("Netscape") != -1){ return false; }*/
  else if(navigator.userAgent.indexOf("Safari") != -1){ return false; }
  else{ return false; }
}