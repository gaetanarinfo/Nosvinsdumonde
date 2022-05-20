// Connexion
$('#form_login').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#form_login').hide();
    $('#loaderUser').fadeIn();

    $.ajax({
        url: '../ajax/ajax-login.php',
        type: 'POST',
        data: formData,
        success: function (data) {

            setTimeout(() => {
                $('#loaderUser').hide();
            }, 900);

            setTimeout(() => {

                var res = JSON.parse(data);

                if (res.login == true) {

                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    $('#message_user').removeClass('alert-danger').addClass('alert-success');
                    $('#message_user').attr('style', 'display: block !important');

                    setTimeout(() => {
                        location.href = '/' + $('#lang').val() + '/';
                    }, 1200);

                } else {

                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('.message_back').html(res.back);
                    $('#message_user').removeClass('alert-success').addClass('alert-danger');
                    $('#message_user').attr('style', 'display: block !important');

                }

            }, 1200);

        }

    })

})

$(document).on('click', '.back', function (e) {

    e.preventDefault();

    $('#message_user').removeAttr('style');
    $('#form_login').show();

})

// Forgot password
$('#form_forgot').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#blocForgotForm').hide();
    $('#loaderForgot').fadeIn();

    $.ajax({
        url: '../ajax/ajax-forgot.php',
        type: 'POST',
        data: formData,
        success: function (data) {

            setTimeout(() => {
                $('#loaderForgot').hide();
            }, 900);

            setTimeout(() => {

                var forgot = JSON.parse(data);

                if (forgot.success == true) {

                    $('#form_forgot .message_icone').html(forgot.icone);
                    $('#form_forgot .message_content').html(forgot.message);
                    $('#form_forgot #message_forgot').removeClass('alert-danger').addClass('alert-success');
                    $('#form_forgot #message_forgot').attr('style', 'display: block !important');
                    $('#forgotPasswordModal .modal-footer').hide();

                } else {

                    $('#form_forgot .message_icone').html(forgot.icone);
                    $('#form_forgot .message_content').html(forgot.message);
                    $('#form_forgot #message_forgot').removeClass('alert-success').addClass('alert-danger');
                    $('#form_forgot #message_forgot').attr('style', 'display: block !important');

                    setTimeout(() => {
                        $('#form_forgot #blocForgotForm').show();
                        $('#form_forgot #forgotPasswordModal .modal-footer').show();
                        $('#form_forgot #message_forgot').removeAttr('style');
                        $('#form_forgot #message_forgot').removeClass('alert-danger').addClass('alert-success');
                    }, 900);

                }

            }, 1200);

        }

    })

})