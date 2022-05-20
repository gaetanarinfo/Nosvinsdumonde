//Selection de l'avis
$(document).on('click', '.selectAvis', function (e) {

    e.preventDefault();

    var value = $(this).data('value'),
        li = $(this);

    if (value == "1") {
        $(document).find('.selectAvis').removeClass('activate');
        li.parent().find(':first-child').addClass('activate');
    }

    if (value == "2") {
        $(document).find('.selectAvis').removeClass('activate');
        li.parent().find(':nth-child(1)').addClass('activate');
        li.parent().find(':nth-child(2)').addClass('activate');
    }

    if (value == "3") {
        $(document).find('.selectAvis').removeClass('activate');
        li.parent().find(':nth-child(1)').addClass('activate');
        li.parent().find(':nth-child(2)').addClass('activate');
        li.parent().find(':nth-child(3)').addClass('activate');
    }

    if (value == "4") {
        $(document).find('.selectAvis').removeClass('activate');
        li.parent().find(':nth-child(1)').addClass('activate');
        li.parent().find(':nth-child(2)').addClass('activate');
        li.parent().find(':nth-child(3)').addClass('activate');
        li.parent().find(':nth-child(4)').addClass('activate');
    }

    if (value == "5") {
        $(document).find('.selectAvis').removeClass('activate');
        li.parent().find(':nth-child(1)').addClass('activate');
        li.parent().find(':nth-child(2)').addClass('activate');
        li.parent().find(':nth-child(3)').addClass('activate');
        li.parent().find(':nth-child(4)').addClass('activate');
        li.parent().find(':nth-child(5)').addClass('activate');
    }

    $('#avisFinal').val(value);

})

$('#formAvis').submit(function (e) {

    e.preventDefault();

    if ($('#avisFinal').val() == "") {
        $('.selectAvis').addClass('error');

        setTimeout(() => {
            $('.selectAvis').removeClass('error');
        }, 900);

    } else {

        if ($('#formAvis').length != 0 && $('#avisFinal').val() != "") {

            if (!grecaptcha.getResponse()) {

                grecaptcha.execute(
                    console.log('exec')
                );
            } else {}

        }

    }

})

function recaptchacheck(token) {

    $('#blocAvisForm').hide();
    $('#loaderVinAvis').fadeIn();

    $.ajax({
        url: "../../ajax/ajax-avis.php",
        type: "POST",
        data: $("#formAvis").serialize(),
        success: function (data) {


            setTimeout(() => {
                $('#loaderVinAvis').hide();
            }, 900);

            setTimeout(() => {

                var parsed = JSON.parse(data);

                if (parsed.success == true) {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_avis').removeClass('alert-danger').addClass('alert-success');
                    $('#message_avis').attr('style', 'display: block !important');
                    $('#avisModal .modal-footer').hide();

                } else {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_avis').removeClass('alert-success').addClass('alert-danger');
                    $('#message_avis').attr('style', 'display: block !important');

                    setTimeout(() => {
                        $('#blocAvisForm').show();
                        $('#avisModal .modal-footer').show();
                        $('#message_avis').removeAttr('style');
                        $('#message_avis').removeClass('alert-danger').addClass('alert-success');
                    }, 900);

                }

            }, 1200);

        }
    });

}


// Cookie favoris

$.cookie.raw = true;

var input = $('#boissonId').val(),
    cond = false;

if ($.cookie('favoris') != "undefined" && $.cookie('favoris') != undefined) {

    var out = $.cookie('favoris').split(',');

    for (let i = 0; i < out.length; i++) {

        if (out[i] != "") {

            if (input.match(new RegExp(`^${out[i]}$`)) != null) {

                $('.add_favoris_unclick').show();
                $('.add_favoris').hide();

                break;

            } else {

                cond = true;
                $('.add_favoris').show();
            }

        } else {
            cond = true;
            $('.add_favoris').show();
        }

    }

    if (cond === true) {

        var counter = out.length,
            countOne = false;

        $('.add_favoris').on('click', function (e) {

            e.preventDefault();

            $('.add_favoris').hide();
            $('.add_favoris_unclick').show();

            if (countOne == false) {
                countOne = true;
                counter++;
            }

            $('.heart_nav a span').text(counter);

            if ($.cookie('favoris') == null) {

                $.cookie('favoris', input, {
                    expires: 365,
                    path: '/'
                });

            } else {

                var oldCookieValue = $.cookie("favoris");

                $.cookie("favoris", oldCookieValue + ',' + input, {
                    expires: 365,
                    path: '/'
                });
            }

        });

    }

} else {

    $('.add_favoris').show();

    var counter = 0,
        countOne = false;

    $('.add_favoris').on('click', function (e) {

        e.preventDefault();

        $('.add_favoris').hide();
        $('.add_favoris_unclick').show();

        if ($.cookie('favoris') == null) {

            $.cookie('favoris', input, {
                expires: 365,
                path: '/'
            });

        } else {

            var oldCookieValue = $.cookie("favoris");

            $.cookie("favoris", oldCookieValue + ',' + input, {
                expires: 365,
                path: '/'
            });

        }

        if (countOne == false) {
            countOne = true;
            counter++;
        }

        $('.heart_nav a span').text(counter);

    });

}

var cookie = $.cookie("favoris");

$('.remove_favoris').on('click', function (e) {

    e.preventDefault();

    var counter = $.cookie("favoris").split(',').length;

    $('.add_favoris_unclick').hide();
    $('.add_favoris').show();

    var cookie = $.cookie("favoris");
    if (cookie.indexOf(input + ',') != -1)
        var oldCookieValue = $.cookie("favoris").replace(input + ',', '');
    else if (cookie.indexOf(',' + input) != -1)
        var oldCookieValue = $.cookie("favoris").replace(',' + input, '');

    if (cookie.split(',').length === 1) {
        $.removeCookie("favoris", {
            path: '/'
        });
    } else {
        $.cookie("favoris", oldCookieValue, {
            expires: 365,
            path: '/'
        });
    }

    if (counter <= 1) $('.heart_nav a span').text('');
    else $('.heart_nav a span').text(counter - 1);


});

// Cookie cart

$.cookie.raw = true;

var input = $('#boissonId').val(),
    cond = false;

if ($.cookie('cart') != "undefined" && $.cookie('cart') != undefined) {

    var out = $.cookie('cart').split(',');

    for (let i = 0; i < out.length; i++) {

        if (out[i] != "") {

            if (input.match(new RegExp(`^${out[i]}$`)) != null) {

                $('.add_cart').show();

                break;

            } else {

                cond = false;
                $('.add_cart').show();
            }

        } else {
            cond = false;
            $('.add_cart').show();
        }

    }

    if (cond === false) {

        var counter = out.length,
            countOne = false;

        $('.add_cart').on('click', function (e) {

            e.preventDefault();

            $('.add_cart').show();

            counter++;

            $('.cart_nav a span').text(counter);

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

    }

} else {
    $('.add_cart').show();

    var counter = 0,
        countOne = false;

    $('.add_cart').on('click', function (e) {

        e.preventDefault();

        $('.add_cart').show();

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

        counter++;

        $('.cart_nav a .count_cart').html('<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"><span class="count_cart">' + counter + '</span></span>');

    });

}