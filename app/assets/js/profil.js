$('#user_profil').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#user_profil').hide();
    $('#loaderUser').fadeIn();

    $.ajax({
        url: '../app/ajax/ajax-editProfil.php',
        type: 'POST',
        data: formData,
        success: function (data) {

            setTimeout(() => {
                $('#loaderUser').hide();
            }, 900);

            setTimeout(() => {

                var res = JSON.parse(data);

                if (res.user == true) {

                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('#message_profil').removeClass('alert-danger').addClass('alert-success');
                    $('#message_profil').attr('style', 'display: block !important');

                } else {

                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('.message_back').html(res.back);
                    $('#message_profil').removeClass('alert-success').addClass('alert-danger');
                    $('#message_profil').attr('style', 'display: block !important');
                    $('#form_login').show();

                }

            }, 1200);

        }

    })

})

$(document).on('click', '.back', function (e) { 

    e.preventDefault();

    $('#message_profil').removeAttr('style');
    $('#form_login').show();

 })