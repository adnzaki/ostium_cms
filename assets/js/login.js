/**
 * OstiumCMS
 * A simple, fast and extensible Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

$(document).ready(function() {
    $("#sign_in").validate({
        rules: {
            username: "required",
            password: "required"
        },
        messages: {
            username: "Silakan masukkan username anda",
            password: "Silakan masukkan password anda"
        },
        submitHandler: function(form) {
            var username = $("#username").val(),
                password = $("#password").val();
            var data = 'username=' + username + '&password=' + password;
            $.ajax({
                url: baseUrl + 'login/login_validation',
                type: 'POST',
                dataType: 'HTML',
                data: data,
                beforeSend: function() {
                    //$(".os-status").text("Mengautentikasi...");
                },
                success: function(data) {
                    if(data === 'failed') {
                        $(".os-status").addClass('os-msg-error');
                        $(".os-status").text("Username atau password yang anda masukkan salah. Silakan coba lagi");
                        setTimeout(function() {
                            $(".os-status").text("Silakan Login untuk masuk ke dalam sistem");
                            $(".os-status").removeClass('os-msg-error');
                        }, 3000)
                    }
                    else {
                        $(".os-status").removeClass('os-msg-error');
                        $(".os-status").text("Login berhasil, mengalihkan halaman...");
                        window.location.href = baseUrl + 'home';
                    }
                }
            })
        }
    })
})
