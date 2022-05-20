// Register
$('#form_forgot').submit(function (e) {

    e.preventDefault();

    var password1 = $('#password').val(),
        password2 = $('#password2').val();

    if (password1 == password2) {

        var formData = $(this).serialize();

        $('#form_forgot').hide();
        $('#loaderUser').fadeIn();

        $.ajax({
            url: '../../ajax/ajax-forgotNewPassword.php',
            type: 'POST',
            data: formData,
            success: function (data) {

                console.log(data);

                $("html, body").animate({
                    scrollTop: $('#blocLoginForm').offset().top - 70
                }, 200);

                setTimeout(() => {
                    $('#loaderUser').hide();
                }, 900);

                setTimeout(() => {

                    var res = JSON.parse(data);

                    if (res.success == true) {

                        $('.message_icone').html(res.icone);
                        $('.message_content').html(res.message);
                        if (res.message2 != "") $('.message_content_2').html(res.message2);
                        $('#message_forgot').removeClass('alert-danger').addClass('alert-success');
                        $('#message_forgot').attr('style', 'display: block !important');

                        setTimeout(() => {
                            location.href = '/' + $('#lang').val() + '/';
                        }, 1200);

                    } else {

                        $('.message_icone').html(res.icone);
                        $('.message_content').html(res.message);
                        if (res.message2 != "") $('.message_content_2').html(res.message2);
                        $('.message_back').html(res.back);
                        $('#message_forgot').removeClass('alert-success').addClass('alert-danger');
                        $('#message_forgot').attr('style', 'display: block !important');
                        $('#form_login').show();

                    }

                }, 1200);

            }

        })

    } else {

        $('#password').addClass('error');
        $('#password2').addClass('error');
        $('#password_error').show();
        $('#password_error').html($('#text_error').val());

        setTimeout(() => {
            $('#password').removeClass('error');
            $('#password2').removeClass('error');
        }, 900);

    }

})

$(document).on('keyup', '#password', '#password2', function (e) {

    $('#password_error').hide();
    
})

$(document).on('click', '.back', function (e) {

    e.preventDefault();

    $('#message_register').removeAttr('style');
    $('#form_register').show();

})