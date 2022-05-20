// Register
$('#form_register').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#form_register').hide();
    $('#loaderUser').fadeIn();

    $.ajax({
        url: '../ajax/ajax-gestionCompte.php',
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

                if (res.update == true) {
                   
                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('#message_register').removeClass('alert-danger').addClass('alert-success');
                    $('#message_register').attr('style', 'display: block !important');

                } else {

                    $('.message_icone').html(res.icone);
                    $('.message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('.message_back').html(res.back);
                    $('#message_register').removeClass('alert-success').addClass('alert-danger');
                    $('#message_register').attr('style', 'display: block !important');
                    $('#form_login').show();

                }

            }, 1200);

        }

    })

})

$(document).on('click', '.back', function (e) {

    e.preventDefault();

    $('#message_register').removeAttr('style');
    $('#form_register').show();

})