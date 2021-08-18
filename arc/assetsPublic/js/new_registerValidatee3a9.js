var jVal = {
    countryCode: "+62",
    countryCodeVN: "+84",
    errors: true,
    email: function() {
        var emailInfo = $("#rg_Email_error");
        var ele = $("input[name='rg_Email']");
        var patt = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
        if (!patt.test(ele.val())) {
            jVal.errors = true;
            emailInfo.html("Email tidak sama atau salah atau tidak ada.");
            ele.parent().addClass("error");
            return false;
        } else {
            ele.parent().removeClass("error");
            emailInfo.html("");
        }
        jVal.activeAllDefaultButton();
        return true;
    },
    matkhau: function() {
        var MK = $("#rg_Password_error");
        var ele = $("input[name='rg_Password']");
        var patt = /[[:space:]]/i;
        if (ele.val().length < 6 || patt.test(ele.val())) {
            jVal.errors = true;
            MK.html("Password salah");
            ele.parent().addClass("error");
            return false;
        } else {
            ele.parent().removeClass("error");
            MK.html("");
        }
        jVal.activeAllDefaultButton();
        return true;
    },
    phonenumber: function() {
        var phoneInfo = $("#rg_PhoneNumber_error");
        var ele = $("input[name='rg_PhoneNumber']");
        var pattern = /^(06|08|09)[0-9]{8}|(0){8}[0-9]{8,12}$/;
        if (!pattern.test(ele.val())) {
            jVal.errors = true;
            phoneInfo.html("Lengkapi verifikasi nomor telepon");
            ele.parent().addClass("error");
            return false;
        } else {
            ele.parent().removeClass("error");
            phoneInfo.html("");
        }
        jVal.activeAllDefaultButton();
        return true;
    },
    verifyPhoneNumber: function() {
        var phoneInfo = $("#rg_PhoneNumber_error");
        var ele = $("input[name='rg_PhoneNumber']");

        phoneNumber = ele.val();
        var phoneVi = jVal.convertPhonenumber(phoneNumber);

        if (phoneVi.indexOf("00000000") == 0) {
            phoneVi = jVal.countryCodeVN + phoneVi.slice(8);
        }
        if (phoneVi.charAt(0) === "0") {
            phoneVi = jVal.countryCode + phoneVi.slice(1);
        }
        if (typeof window.recaptchaVerifier === "undefined") {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
                "recaptcha-container",
                {
                    size: "invisible",
                    callback: function(response) {},
                    "expired-callback": function() {
                        jVal.renderRecaptcha();
                    }
                }
            );
            // jVal.activeAllDefaultButton();
        } else {
            jVal.renderRecaptcha();
        }
        firebase
            .auth()
            .signInWithPhoneNumber(phoneVi, window.recaptchaVerifier)
            .then(function(confirmationResult) {
                jVal.confirmationResult = confirmationResult;
                jVal.verifyStep();
                $('#phone_verify').text(phoneVi);
            })
            .catch(function(error) {
                if (typeof error.code === "undefined") {
                    $(".rg_VerifyCode_error").html(
                        "Terjadi kesalahan, silahkan coba kembali."
                    );
                    jVal.activeRegisterButton("Coba lagi", function() {
                        location.reload();
                    });
                    jVal.activeConfirmButton("Coba lagi", function() {
                        location.reload();
                    });
                    jVal.activeConfirmFBButton("Coba lagi", function() {
                        location.reload();
                    });
                    return;
                }
                $.when(jVal.handleFirebaseError(error.code)).then(function(
                    message
                ) {
                    jVal.warningError(message);
                });
            });
    },
    verifyCode: function() {
        if (!jVal.inputHasVal("input[name=verificationcode]")) {
            var message = jVal.handleFirebaseError(
                "auth/missing-verification-code"
            );
            jVal.showError(".rg_VerifyCode_error", message);
            return false;
        }
        var verificationcode = $("input[name=verificationcode]").val();
        jVal.sendingAllDefaultButton();
        jVal.confirmationResult.confirm(verificationcode).then(
            function(result) {
                firebase
                    .auth()
                    .currentUser.getIdToken(true)
                    .then(function(idToken) {
                        if (document.getElementById("XacNhanSoDienThoaiMoi")) {
                            jVal.xacnhansodienthoaimoi(
                                null,
                                result,
                                idToken,
                                false
                            );
                        } else if (document.getElementById("GuiDangKy")) {
                            jVal.guidangky(null, result, idToken);
                        } else if (
                            document.getElementById("XacNhanSoDienThoaiFB")
                        ) {
                            jVal.xacnhansodienthoaiFB(null, result, idToken);
                        }
                    })
                    .catch(function(error) {
                        jVal.verifyStep();
                        var message = jVal.handleFirebaseError(error.code);
                        jVal.showError(".rg_VerifyCode_error", message);
                    });
            },
            function(error) {
                jVal.verifyStep();
                var message = jVal.handleFirebaseError(error.code);
                if (message === "") return false;
                jVal.showError(".rg_VerifyCode_error", message);
            }
        );
    },
    handleFirebaseError: function(code) {
        message = "";
        switch (code) {
            /* case "auth/user-token-expired":
                 message = Rf();
                 break;*/
            case "auth/app-not-authorized":
                message =
                    "This app, identified by the domain where it's hosted, is not authorized to use Firebase Authentication with the provided API key. Review your key configuration in the Google API console.";
                jVal.warningError(message);
                break;
            case "auth/network-request-failed":
                message = "Terjadi kesalahan koneksi internet";
                jVal.warningError(message);
                break;
            case "auth/invalid-phone-number":
                message = "Nomor telepon tidak terdaftar";
                break;
            case "auth/invalid-verification-code":
                message = "Kode verifikasi tidak sesuai";
                break;
            case "auth/code-expired":
                message =
                    "Pesan SMS sudah tidak berlaku. Silahkan kirim ulang kode verifikasi untuk mencoba kembali";
                jVal.warningError(message);
                break;
            case "auth/too-many-requests":
                message =
                    "Perangkat ini telah diblokir. Silahkan coba kembali 30 menit kemudian";
                jVal.warningError(message);
                break;
            case "auth/quota-exceeded":
                $.ajax({
                    type: "post",
                    url: "/public/register/register-firebase-config",
                    success: function(data) {
                        firebase
                            .app()
                            .delete()
                            .then(function() {
                                firebase.initializeApp(
                                    JSON.parse(data["firebaseConfig"])
                                );
                                jVal.verifyPhoneNumber();
                            });
                    }
                });
                message = "Terjadi kesalahan, silahkan coba kembali.";
                break;
            case "auth/missing-verification-code":
                message = "Silahkan masukkan kode yang benar";
                break;
            default:
                message = "Terjadi kesalahan, silahkan coba kembali.";
                jVal.warningError(message);
                break;
        }
        return message;
    },
    activeConfirmFBButton: function(
        titleButton = "Konfirmasi",
        eventDefault = function() {
            jVal.errors = false;
            var checkPassword = jVal.matkhau();
            var checkPhonenumber = jVal.phonenumber();
            var checkEmail = jVal.email();
            if (!checkPhonenumber || !checkPassword || !checkEmail) {
                return false;
            }
            var data = [];
            data["rg_phonenumber"] = $.trim(
                $("input[name='rg_PhoneNumber']").val()
            );
            data["rg_password"] = $("input[name='rg_Password']").val();
            data["rg_email"] = $("input[name='rg_Email']").val();
            data["rg_srcfrom"] = $("input[name='rg_srcFrom']").val();
            jVal.xacnhansodienthoaiFB(data);
        }
    ) {
        $("#XacNhanSoDienThoaiFB")
            .text(titleButton)
            .css("background-color", "#03a9f4");
        $(document)
            .off("click", "#XacNhanSoDienThoaiFB")
            .on("click", "#XacNhanSoDienThoaiFB", function() {
                eventDefault();
            });
    },
    sendingConfirmFBButton: function(titleButton = "Mengirim...") {
        $("#XacNhanSoDienThoaiFB")
            .text(titleButton)
            .css("background-color", "gray");
        $(document).off("click", "#XacNhanSoDienThoaiFB");
    },
    activeConfirmButton: function(
        titleButton = "Konfirmasi",
        eventDefault = function() {
            jVal.errors = false;
            var checkEmail = jVal.email();
            var checkPassword = jVal.matkhau();
            var checkPhonenumber = jVal.phonenumber();
            if (!checkEmail || !checkPhonenumber || !checkPassword) {
                jVal.errors = true;
                return false;
            }
            var data = [];
            data["rg_email"] = $.trim($("input[name='rg_Email']").val());
            data["rg_phonenumber"] = $.trim(
                $("input[name='rg_PhoneNumber']").val()
            );
            data["rg_password"] = $("input[name='rg_Password']").val();
            data["blogComp"] = $("input[name='blogComp']").val();
            jVal.xacnhansodienthoaimoi(data);
            jVal.errors = false;
        }
    ) {
        $("#XacNhanSoDienThoaiMoi")
            .text(titleButton)
            .css("background-color", "#03a9f4");
        $(document)
            .off("click", "#XacNhanSoDienThoaiMoi")
            .on("click", "#XacNhanSoDienThoaiMoi", function() {
                eventDefault();
            });
    },
    sendingConfirmButton: function(titleButton = "Mengirim...") {
        $("#XacNhanSoDienThoaiMoi")
            .text(titleButton)
            .css("background-color", "gray");
        $(document).off("click", "#XacNhanSoDienThoaiMoi");
    },
    activeRegisterButton: function(
        titleButton = "Register",
        eventDefault = function() {
            jVal.errors = false;
            var checkEmail = jVal.email();
            var checkPassword = jVal.matkhau();
            var checkPhonenumber = jVal.phonenumber();
            if (!checkEmail || !checkPassword || !checkPhonenumber) {
                jVal.errors = true;
                return false;
            }
            var data = [];
            data["rg_email"] = $.trim($("input[name='rg_Email']").val());
            data["rg_phonenumber"] = $.trim(
                $("input[name='rg_PhoneNumber']").val()
            );
            data["rg_password"] = $("input[name='rg_Password']").val();
            data["rg_refUserName"] = $.trim(
                $("input[name='refUserName']").val()
            );
            data["blogComp"] = $("input[name='blogComp']").val();
            jVal.guidangky(data);
            jVal.errors = false;
        }
    ) {
        $("#GuiDangKy")
            .text(titleButton)
            .css("background-color", "#03a9f4");
        $(document)
            .off("click", "#GuiDangKy")
            .on("click", "#GuiDangKy", function() {
                eventDefault();
            });
    },
    sendingRegisterButton: function(titleButton = "Mengirim...") {
        $("#GuiDangKy")
            .text(titleButton)
            .css("background-color", "gray");
        $(document).off("click", "#GuiDangKy");
    },
    inputHasVal: function(specified) {
        var val = $(specified).val();
        return val.length > 0 ? true : false;
    },
    showError: function(specified, message) {
        var element = $(specified);
        element.html(message);
        element.show();
    },
    renderRecaptcha: function() {
        // Temporary fixing: Cannot reload recappcha
        // alert("Phiên đăng kí của bạn đã hết hạn.\n nhấn đồng ý để thử lại.");
        // location.reload()
        if (typeof window.recaptchaVerifier === "undefined") return false;
        window.recaptchaVerifier.render().then(function(widgetId) {
            grecaptcha.reset(widgetId);
        });
    },
    guidangky: function(rg_data = null, auth = null, idToken = "") {
        if (rg_data != null) jVal.rg_data = rg_data;
        var email = $.trim(jVal.rg_data["rg_email"]);
        var phonenumber = $.trim(jVal.rg_data["rg_phonenumber"]);
        var password = jVal.rg_data["rg_password"];
        var refusername = $.trim(jVal.rg_data["rg_refUserName"]);
        var blogComp = jVal.rg_data["blogComp"];
        var uid = "";
        if (
            auth != undefined &&
            auth != null &&
            auth.user.uid != undefined &&
            auth.user.uid != null
        ) {
            uid = auth.user.uid;
        }
        jVal.sendingAllDefaultButton("Konfirmasi");
        $.ajax({
            type: "POST",
            url: "/public/register/register-ajax",
            data: {
                rg_Email: email,
                rg_Password: password,
                rg_PhoneNumber: phonenumber,
                refUserName: refusername,
                fbUid: uid,
                idToken: idToken,
                blogComp: blogComp
            },
            async: false,
            success: function(data) {
                jVal.activeAllDefaultButton();
                switch (data.status) {
                    case 1:
                        userID = data["uid"];
                        parent.closeFancyboxAndRedirectToUrl(
                            "/public/register/thanks/UserID/" + userID
                        );
                        break;
                    case 2:
                        parent.closeFancyboxAndRedirectToUrl(
                            "/public/register/confirm-account-phone"
                        );
                        break;
                    case 3:
                        $("#rg_Password_error").html("Password salah.");
                        break;
                    case 4:
                        parent.closeFancyboxAndRedirectToUrl(
                            "/public/register/confirm-account-connection"
                        );
                        break;
                    case 5:
                        parent.closeFancyboxAndRedirectToUrl(
                            "/public/user/finishregister/UserID/" + data["uid"]
                        );
                        break;
                    case 6:
                        $("#rg_PhoneNumber_error").html("Phone number salah");
                        break;
                    case 7:
                        $("#rg_Email_error").html("Email tidak valid");
                        break;
                    case 8:
                        $("#rg_PhoneNumber_error").html(
                            "Nomor telepon yang anda masukan tidak valid"
                        );
                        break;
                    case 9:
                        $("#rg_Email_error").html("Email tidak valid");
                        break;
                    case 12:
                        $("#rg_PhoneNumber_error").html(
                            "Nomor telepon yang anda masukan sudah terdaftar"
                        );
                        break;
                    case 10: // Continue to verify otp
                        // jVal.sendingAllDefaultButton();

                        if (typeof jVal.fbConfig != "undefined") {
                            jVal.verifyPhoneNumber();
                            break;
                        }

                        if (
                            data.fbConfig != undefined &&
                            data.fbConfig != null
                        ) {
                            jVal.fbConfig = data.fbConfig;
                            try {
                                firebase
                                    .app()
                                    .delete()
                                    .then(function() {
                                        firebase.initializeApp(jVal.fbConfig);
                                    });
                            } catch (error) {
                                firebase.initializeApp(jVal.fbConfig);
                            }
                            jVal.verifyPhoneNumber();
                        }
                        break;
                    default:
                        message = "Terjadi kesalahan, silahkan coba kembali.";
                        jVal.warningError(message);
                        break;
                }
            }
        });
    },
    xacnhansodienthoaimoi: function(
        rg_data = null,
        auth = null,
        idToken = "",
        ajaxRequest = true
    ) {
        if (rg_data != null) jVal.rg_data = rg_data;
        var email = $.trim(jVal.rg_data["rg_email"]);
        var phonenumber = $.trim(jVal.rg_data["rg_phonenumber"]);
        var password = jVal.rg_data["rg_password"];
        var uid = "";
        if (
            auth != undefined &&
            auth != null &&
            auth.user.uid != undefined &&
            auth.user.uid != null
        ) {
            uid = auth.user.uid;
        }
        jVal.sendingAllDefaultButton("Konfirmasi");
        $.ajax({
            type: "POST",
            url: "/public/index/confirm-new-phone",
            data: {
                rg_Email: email,
                rg_PhoneNumber: phonenumber,
                rg_Password: password,
                ajaxRequest: ajaxRequest,
                fbUid: uid,
                idToken: idToken
            },
            async: false,
            success: function(data) {
                // ERR_INVALID_EMAIL = 1;
                // ERR_INVALID_PHONENUMBER = 2;
                // ERR_NOT_EXISTS_EMAIL = 3;
                // ERR_EXISTS_PHONENUMBER = 4;
                // ERR_MISSING_VERIFY_CODE = 5;
                // SUCCESS_CONFIRMATION = 0;
                // ERR_WRONG_PASSWORD = 6;

                jVal.activeAllDefaultButton();
                switch (data.status) {
                    case 1:
                    case 3:
                        $("#rg_Email_error").html(data.message);
                        break;
                    case 2:
                    case 4:
                        $("#rg_PhoneNumber_error").html(data.message);
                        break;
                    case 6:
                        $("#rg_Password_error").html(data.message);
                        break;
                    case 5:
                        // jVal.sendingAllDefaultButton();

                        if (typeof jVal.fbConfig != "undefined") {
                            jVal.verifyPhoneNumber();
                            break;
                        }

                        $.ajax({
                            type: "post",
                            url: "/public/register/get-active-firebase-config",
                            success: function(data) {
                                jVal.fbConfig = JSON.parse(
                                    data["firebaseConfig"]
                                );
                                try {
                                    firebase
                                        .app()
                                        .delete()
                                        .then(function() {
                                            firebase.initializeApp(
                                                jVal.fbConfig
                                            );
                                        });
                                } catch (error) {
                                    firebase.initializeApp(jVal.fbConfig);
                                }
                                jVal.verifyPhoneNumber();
                            }
                        });
                        break;
                    case 7:
                        jVal.warningError(data.message);
                        break;
                    case 0:
                        $("input[name='fbUid']").val(uid);
                        doPost("confirm_phone");
                        break;
                }
            }
        });
    },
    xacnhansodienthoaiFB: function(
        rg_data = null,
        auth = null,
        idToken = "",
        ajaxRequest = true
    ) {
        if (rg_data != null) jVal.rg_data = rg_data;
        var phonenumber = $.trim(jVal.rg_data["rg_phonenumber"]);
        var password = jVal.rg_data["rg_password"];
        var email = $.trim(jVal.rg_data["rg_email"]);
        var src = $.trim(jVal.rg_data["rg_srcfrom"]);
        var uid = "";
        if (
            auth != undefined &&
            auth != null &&
            auth.user.uid != undefined &&
            auth.user.uid != null
        ) {
            uid = auth.user.uid;
        }

        jVal.sendingAllDefaultButton("Konfirmasi");
        $.ajax({
            type: "POST",
            url: window.location.pathname,// /public/index/confirm-phone
            data: {
                rg_PhoneNumber: phonenumber,
                rg_Password: password,
                rg_Email: email,
                ajaxRequest: ajaxRequest,
                fbUid: uid,
                idToken: idToken,
                src: src
            },
            async: false,
            success: function(data) {
                // ERR_INVALID_EMAIL = 1;
                // ERR_INVALID_PHONENUMBER = 2;
                // ERR_NOT_EXISTS_EMAIL = 3;
                // ERR_EXISTS_PHONENUMBER = 4;
                // ERR_MISSING_VERIFY_CODE = 5;
                // SUCCESS_CONFIRMATION = 0;
                // ERR_WRONG_PASSWORD = 6;

                jVal.activeAllDefaultButton();
                switch (data.status) {
                    case 1:
                    case 3:
                    case 8:
                        $("#rg_Email_error").html(data.message);
                        break;
                    case 2:
                        $("#rg_PhoneNumber_error").html(data.message);
                        break;
                    case 6:
                        $("#rg_Password_error").html(data.message);
                        break;
                    case 5:
                        if (typeof jVal.fbConfig != "undefined") {
                            jVal.verifyPhoneNumber();
                            break;
                        }

                        $.ajax({
                            type: "post",
                            url: "/public/register/get-active-firebase-config",
                            success: function(data) {
                                jVal.fbConfig = JSON.parse(
                                    data["firebaseConfig"]
                                );
                                try {
                                    firebase
                                        .app()
                                        .delete()
                                        .then(function() {
                                            firebase.initializeApp(
                                                jVal.fbConfig
                                            );
                                        });
                                } catch (error) {
                                    firebase.initializeApp(jVal.fbConfig);
                                }
                                jVal.verifyPhoneNumber();
                            }
                        });
                        break;
                    case 7:
                        jVal.warningError(data.message);
                        break;
                    case 0:
                    case 4:
                        $("input[name='fbUid']").val(uid);
                        doPost("confirm_phone");
                        break;
                    default:
                }
            }
        });
    },
    verifyStep: function() {
        jVal.phoneNumber = $("input[name='rg_PhoneNumber']").val();
        $(".input-wrapper:not(#otp_verificationcode)").slideUp();
        $("#otp_verificationcode").slideDown();
        jVal.activeRegisterButton("Confirm phonenumber", function() {
            jVal.verifyCode();
        });
        jVal.activeConfirmButton("Confirm phonenumber", function() {
            jVal.verifyCode();
        });
        jVal.activeConfirmFBButton("Confirm phonenumber", function() {
            jVal.verifyCode();
        });
        $(document)
            .off("click", "#resendSMS")
            .on("click", "#resendSMS", function() {
                jVal.resendSMS();
            });
    },
    warningError: function(errorMessage) {
        $(".rg_VerifyCode_error").html(errorMessage);
        $(".input-wrapper").slideUp();
        jVal.activeRegisterButton("Coba lagi", function() {
            location.reload();
        });
        jVal.activeConfirmButton("Coba lagi", function() {
            location.reload();
        });
        jVal.activeConfirmFBButton("Coba lagi", function() {
            location.reload();
        });
    },
    activeAllDefaultButton: function(titleButton = "Konfirmasi") {
        jVal.activeConfirmFBButton(titleButton);
        jVal.activeConfirmButton(titleButton);
        jVal.activeRegisterButton(titleButton);
    },
    sendingAllDefaultButton: function(titleButton = "Mengirim...") {
        jVal.sendingRegisterButton(titleButton);
        jVal.sendingConfirmButton(titleButton);
        jVal.sendingConfirmFBButton(titleButton);
    },
    resendSMS: function() {
        if (!jVal.errors) {
            $.when(jVal.verifyPhoneNumber()).then(function() {
                alert("Pesan telah terkirim");
            });
        }
    },
    convertPhonenumber: function(phonenumber) {
        var phoneVi = phonenumber;
        if (phoneVi.indexOf("00000000") == 0) {
            phoneVi = jVal.countryCodeVN + phoneVi.slice(8);
        }
        if (phoneVi.charAt(0) === "0") {
            phoneVi = jVal.countryCode + phoneVi.slice(1);
        }
        return phoneVi;
    }
};
// ====================================================== //
$(document).on("blur", "input[name='rg_Email']", function() {
    jVal.email();
});
$(document).on("blur", "input[name='rg_Password']", function() {
    jVal.matkhau();
});
$(document).on("blur", "input[name='rg_PhoneNumber']", function() {
    jVal.phonenumber();
});
$(document).on("click", "#notgetsms", function() {
    var phoneNumber = $.trim(jVal.phoneNumber);
    $.ajax({
        type: "POST",
        url: "/public/register/not-get-sms",
        data: {
            phoneNumber: phoneNumber,
            countryCode: jVal.countryCode
        },
        success: function(data) {
            var message = null;
            if (!data.status) {
                message = "Telah terjadi kesalahan";
            } else {
                message = "Terimakasih untuk masukan Anda";
            }
            $(".rg_VerifyCode_error").html(message);
        }
    });
});
// -----------------------------------------------------------------
jVal.activeAllDefaultButton();
