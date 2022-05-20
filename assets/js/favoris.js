$.cookie.raw = true;

$(document).on('click', '.remove_favoris', function (e) {

    e.preventDefault();

    var counter = $.cookie("favoris").split(',').length;

    var id = $(this).attr('data-id'),
        cookie = $.cookie("favoris");
    if (cookie.indexOf(id + ',') != -1)
        var oldCookieValue = $.cookie("favoris").replace(id + ',', '');
    else if (cookie.indexOf(',' + id) != -1)
        var oldCookieValue = $.cookie("favoris").replace(',' + id, '');

    console.log(cookie.split(','));

    if (cookie.split(',').length === 1) {

        $.removeCookie("favoris", {
            path: '/'
        });

        setTimeout(() => {
            $(location).attr('href', `https://${$('#host').val()}/${$('#langs_fav').val()}/`);
        }, 300);

    }

    if (cookie.split(',').length === 2) {
        $.cookie("favoris", oldCookieValue, {
            expires: 365,
            path: '/'
        });
    }

    if (cookie.split(',').length === 3) {
        $.cookie("favoris", oldCookieValue, {
            expires: 365,
            path: '/'
        });
    }

    if (cookie.split(',').length > 3) {
        $.cookie("favoris", oldCookieValue, {
            expires: 365,
            path: '/'
        });
    }

    $(`.fav_box_${id}`).fadeOut();

    $.ajax({
        url: '../../ajax/ajax-getCookie.php',
        success: function (data) {

            $('#p1').val(`https://www.liscorn.com/${$('#langs_fav').val()}/share/` + data + '/');

        },
        error: function (err) {
            // console.log("Error: ", err);
        }
    });

    if (counter <= 1) $('.heart_nav a span').text('');
    else $('.heart_nav a span').text(counter - 1);

});

$('#shared').on('click', function (e) {

    e.preventDefault();

    navigator.clipboard.writeText($('#p1').val());

    $(this).hide();
    $('#shareds').show()

})

$('#form_partager').submit(function (e) {

    e.preventDefault();

    if (!grecaptcha.getResponse()) {

        grecaptcha.execute(
            console.log('exec')
        );
    } else {
        console.log('Form submitted.');
    }

});

function recaptcha_check(token) {

    var url = `../../ajax/ajax-sendTableFavorite.php`;

    $('.form_partager').hide();
    $('#loaderFavoris').fadeIn();

    $.ajax({
        url: url,
        type: "POST",
        data: {
            email: $('#partager_email').val(),
            prenom: $('#partager_prenom').val(),
            lang: $('#langs_fav').val(),
            host: $('#host').val()
        },
        success: function (data) {

            setTimeout(() => {
                $('#loaderFavoris').hide();
            }, 900);

            setTimeout(() => {

                var parsed = JSON.parse(data);

                if (parsed.success == true) {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_favoris').removeClass('alert-danger').addClass('alert-success');
                    $('#message_favoris').attr('style', 'display: block !important');
                    $('#close_modal_favoris').show();

                } else {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_avis').removeClass('alert-success').addClass('alert-danger');
                    $('#message_avis').attr('style', 'display: block !important');

                    setTimeout(() => {
                        $('.form_partager').show();
                        $('#message_favoris').removeAttr('style');
                        $('#message_favoris').removeClass('alert-danger').addClass('alert-success');
                    }, 900);

                }

            }, 1200);

        },
        error: function (err) {
            // console.log("Error: ", err);
        }
    });

}