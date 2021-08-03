var jVal = {
    'email' : function() {
        var emailInfo = $('#rg_Emailerror');
        var ele = $("input[name='username']");
        if(!ele.val()){
            jVal.errors = true;
            emailInfo.html('Informasi akun tidak valid');
            ele.parent().addClass('error');
        }else{
            ele.parent().removeClass('error');
            emailInfo.html('');
        }
    },
    'login' : function (){
        if(!jVal.errors){
            $('#login_popup_submit .login_button_text').toggle();
            var username=$.trim($("input[name='username']").val());
            var password=$.trim($("input[name='password']").val().trim());
            var redirect=$("input[name='popup_redirect']").val();
            var remember='';
            if($("input[name='popup_rememberme']").attr('checked') == 'checked'){
                remember=1;
            }
            $.ajax({
                type: "POST",
                url: "/public/index/check-login-ajax",
                data:{'lg_Username':username, 'lg_Password':password, 'rememberMe':remember},
                success: function(data){
                    numTest = parseInt(data);
                    console.log(numTest);
                    if (numTest == 1) {
                        // back_url=parent.$("input[name='backurl']").val();
                        if (redirect == '') {
                            parent.closeFancyboxAndRedirectToUrl('/public/index/public-survey');
                        } else{
                            parent.closeFancyboxAndRedirectToUrl(decodeURIComponent(redirect.replace(/\+/g,  " ")));
                        }
                    } else if (numTest == 2) {
                        parent.closeFancyboxAndRedirectToUrl('/public/index/reqinfo');
                    } else if (numTest == 3) {
                        parent.closeFancyboxAndRedirectToUrl('/public/index/update-phone');
                    } else if (numTest == 4) {
                        parent.closeFancyboxAndRedirectToUrl('/public/index/confirm-new-phone');
                    } else{
                        $("#popup_error").html(data);
                    }
                },
                complete: function(){
                    $('#login_popup_submit .login_button_text').toggle();
                }
            });
        }
    }
};
// ====================================================== //
$('#login_popup_submit').bind('click',function (){
    jVal.errors = false;
    jVal.email();
    jVal.login();
    return false;
});
$("input[name='username']").change(jVal.email);
$("input[name='username'],input[name='password']").keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        jVal.errors = false;
        jVal.email();
        jVal.login();
        return false;
    }
});