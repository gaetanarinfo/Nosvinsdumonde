$('#valide_cart').on('click', function (e) {

    e.preventDefault();

    $('.steps .step:nth-child(1)').removeClass('active');
    $('.steps .step:nth-child(1)').addClass('prev');
    $('.steps .step:nth-child(2)').addClass('active');
    $('.stepper-content-container .stepper-content:nth-child(1)').removeClass('show');
    $('.stepper-content-container .stepper-content:nth-child(2)').addClass('show');
    $('#bloc_paiement_recap').hide();
    $('#bloc_paiement_final').show();
    $('#bloc_adresse_final').show();

})

$(document).on('click', '.steps .step:nth-child(1)', function (e) {

    e.preventDefault();

    $('#bloc_paiement_final').hide();
    $('#bloc_paiement_recap').show();
    $('#bloc_adresse_final').show();

})

$(document).on('click', '.steps .step:nth-child(2)', function (e) {

    e.preventDefault();

    $('#bloc_paiement_recap').hide();
    $('#bloc_paiement_final').show();
    $('#bloc_adresse_final').show();

})

var cookie = $.cookie("cart");

$.cookie.raw = true;

$(document).on('click', '.remove_produit', function (e) {

    e.preventDefault();

    var input = $(this).data('id');

    var cookie = $.cookie("cart");
    if (cookie.indexOf(input + ',') != -1)
        var oldCookieValue = $.cookie("cart").replace(input + ',', '');
    else if (cookie.indexOf(',' + input) != -1)
        var oldCookieValue = $.cookie("cart").replace(',' + input, '');

    if (cookie.split(',').length === 1) {
        $.removeCookie("cart", {
            path: '/'
        });
        location.reload();
    } else {
        $.cookie("cart", oldCookieValue, {
            expires: 365,
            path: '/'
        });
        location.reload();
    }

});

if ($.cookie('cart') != "undefined" && $.cookie('cart') != undefined) {

    $('.add_produit').on('click', function (e) {

        e.preventDefault();

        var input = $(this).data('id');

        if ($.cookie('cart') == null) {

            $.cookie('cart', input, {
                expires: 365,
                path: '/'
            });

            location.reload();

        } else {

            var oldCookieValue = $.cookie("cart");

            $.cookie("cart", oldCookieValue + ',' + input, {
                expires: 365,
                path: '/'
            });

            location.reload();
        }

    });


} else {

    $('.add_produit').on('click', function (e) {

        e.preventDefault();

        $('.add_produit').show();

        if ($.cookie('cart') == null) {

            $.cookie('cart', input, {
                expires: 365,
                path: '/'
            });

        } else {

            var oldCookieValue = $.cookie("cart");

            $.cookie("cart", oldCookieValue + ',' + input, {
                expires: 365,
                path: '/'
            });

        }

    });

}

// Connexion
$('#form_login').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#form_login').hide();
    $('#loaderUser').fadeIn();

    $.ajax({
        url: '../../ajax/ajax-login.php',
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
                        location.reload()
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

// Register
$('#form_register').submit(function (e) {

    e.preventDefault();

    var formData = $(this).serialize();

    $('#form_register').hide();
    $('#loaderUser2').fadeIn();

    $.ajax({
        url: '../../ajax/ajax-register.php',
        type: 'POST',
        data: formData,
        success: function (data) {

            $("html, body").animate({
                scrollTop: $('#blocLoginForm').offset().top - 70
            }, 200);

            setTimeout(() => {
                $('#loaderUser2').hide();
            }, 900);

            setTimeout(() => {

                var res = JSON.parse(data);

                if (res.register == true) {

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

$(document).on('change', 'input[name=retrait]', function (e) {

    e.preventDefault();

    var value = $(this).val();

    if (value == "1") {

        $.cookie("port", value, {
            expires: 365,
            path: '/'
        });

        location.reload();

    } else if (value == "2") {

        $.cookie("port", value, {
            expires: 365,
            path: '/'
        });

        location.reload();

    }

})

$(document).on('change', '#giftMessage', function (e) {

    var value = $(this).val();

    $.cookie("giftMessage", value, {
        expires: 365,
        path: '/'
    });

})

$(document).on('change', 'input[name=paiement]', function (e) {

    var value = $(this).val();

    if (value == "1") {
        $('.paypal_element').hide();
        $('.card_element').show();
    } else if (value == "2") {
        $('.card_element').hide();
        $('.paypal_element').show();
    }

})

$(document).on('click', '#user_cashback', function (e) {

    e.preventDefault();

    $.cookie("cashBackUse", "1", {
        expires: 365,
        path: '/'
    });

    location.reload();

})

$(document).on('click', '#user_remove_cashback', function (e) {

    e.preventDefault();

    $.removeCookie('cashBackUse', { path: '/' });
    
    location.reload();

})
