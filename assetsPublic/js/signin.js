// MUST INIT HERE --- SOCIAL SIGN-IN | Kami.2014.04.21.10:27
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '604761316272742',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true,  // parse XFBML
    version    : 'v2.8' // use graph api version 2.8
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below
  // will be handled.
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs.
    if (response.status === 'connected') {
      testAPI();
    } else if (response.status === 'not_authorized') {
      FB.login();
    } else {
      FB.login();
    }
  });
};

  // Load the SDK asynchronously
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async = true;
  js.src = "../../../connect.facebook.net/en_US/all.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

 function testAPI(phase) {
  console.log('Thank you for signing in with Facebook. Loading next phase... [' + phase + ']');
  FB.api('/me', function(response) {
    if (typeof response.name != 'undefined') {
      console.log('Good to see you, ' + response.name + ' - ' + response.email);
      return true;
    } else return false;
  });
}

function signinfb(srcFrom, uid) {
  if (typeof srcFrom != 'undefined' && typeof uid != 'undefined') {
    if (srcFrom == 'fb') {
      document.signin.srcFrom.value = srcFrom;
      document.signin.uid.value = uid;
      document.signin.submit();
      //var url = '/public/index/signin/?'+$.param($('[name=signin]').serializeArray());
      //newwindow=window.open(url,'name','height=200,width=150');
      //if (window.focus) {newwindow.focus()}
    }
  } else {
    refusePermission();
  }
}

$('#signup_fb').click(function() {
    $('#signup_fb img')[0].src="../../application/templates/default/afterlogin/images/ajax-loader.gif";
    //$('#facebook_login_area')[0].style['text-align']="center";
    if (FB && (!FB.getAccessToken() || (!FB.getUserID() || FB.getUserID() == ''))) {
      FB.login(function(response) {
        if (response.authResponse) {
          testAPI('Login done');
      FB.api('/me',function(data) {
        if (typeof data.name == 'undefined') {
          refusePermission();
        } else {
          if (typeof FB.getAccessToken() != 'undefined' && FB.getAccessToken() != null) signinfb('fb', FB.getAccessToken());
          else {
            refusePermission();
          }
        }
      });
        } else {
          alert("Please log in Facebook first!");
          console.log('User cancelled login or did not fully authorize.');
          location.reload();
        }
      }, {
        scope: 'email'
      });
    } else {
    if (typeof FB.getAccessToken() != 'undefined' && FB.getAccessToken() != null) signinfb('fb', FB.getAccessToken());
    else {
      refusePermission();
    }
    }
});
  
  $('#signup_tw').click(function() {
	if (typeof _gaq !='undefined' && _gaq) {
		_gaq.push(['_trackEvent', 'User Logins', 'Login','Twitter']);
	}
  });

function refusePermission() {
  alert('Connect to Facebook is failed!\nPlease check your account at https://www.facebook.com/settings?tab=applications \n\nMake sure you have allowed access to your email.\n\nPlease contact to Nusaresearch if you have problem.');
  location.reload();
  FB.api("/me/permissions","DELETE",function(response){
    console.log(response);
  });
}