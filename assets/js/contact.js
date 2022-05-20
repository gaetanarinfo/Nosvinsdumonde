// Formulaire de contact
$('#form_contact').submit(function (e) {

    e.preventDefault();

    if (!grecaptcha.getResponse()) {

        grecaptcha.execute(
            console.log('exec')
        );
    } else {}

})

function recaptchacheck(token) {

    $("html, body").animate({
        scrollTop: $('.blocContactForm').offset().top - 70
    }, 200);

    $('#form_contact').hide();
    $('#loaderContact').fadeIn();

    $.ajax({
        url: "../../ajax/ajax-contact.php",
        type: "POST",
        data: $("#form_contact").serialize(),
        success: function (data) {

            setTimeout(() => {
                $('#loaderContact').hide();
            }, 1300);

            setTimeout(() => {

                var parsed = JSON.parse(data);

                if (parsed.success == true) {

                    $('.message_title').html(parsed.title);
                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('.message_content_2').html(parsed.message2);
                    $('#message_contact').removeClass('alert-danger').addClass('alert-success');
                    $('#message_contact').attr('style', 'display: block !important');

                } else {

                    $('.message_title').html(parsed.title);
                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('.message_content_2').html(parsed.message2);
                    $('#message_contact').removeClass('alert-success').addClass('alert-danger');
                    $('#message_contact').attr('style', 'display: block !important');

                    setTimeout(() => {
                        $('#form_contact').show();
                        $('#message_contact').removeAttr('style');
                        $('#message_contact').removeClass('alert-danger').addClass('alert-success');
                    }, 900);

                }

            }, 1200);

        }
    });

}