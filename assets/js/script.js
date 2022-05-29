var request_search_produits = null;

//Get the button
let backButton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        backButton.style.display = "block";
    } else {
        backButton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
backButton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// Search box
$('#input_search').on('keyup', function (e) {

    if ($(this).val().length > 1) {
        checkSearch($(this));
    } else {
        $('.box_search').html('');
        $('#search_box').hide();
    }

})

$('#input_search:invalid ~ span:after').on('click', function (e) {

    e.preventDefault();

    $('.box_search').html('');
    $('#search_box').hide();

})

function checkSearch(data) {

    var search = data.val();
    var lang = $('#lang').val();
    var host = $('#host').val();

    if (search.length > 1) {

        $('.close_search').show();

        if (request_search_produits != null) request_search_produits.abort();

        request_search_produits = $.ajax({
            url: 'https://nosvinsdumonde.com/ajax/ajax-searchBox.php',
            cache: false,
            data: {
                search: search,
                lang: lang,
                host: host
            },
            success: function (data) {

                console.log(data);

                var res = JSON.parse(data);

                if (res.search === true) {

                    $('.box_search').html(res.return);
                    $('#search_box').show();

                }

                if (res.search === false) {

                    $('.box_search').html(res.return);
                    $('#search_box').show();

                }

            }
        });

    } else {
        $('.box_search').html('');
        $('#search_box').hide();
        $('.close_search').hide();
    }

}

$(document).on('click', '.close_search', function (e) {

    $(this).hide();
    $('.search_box').hide();
    $('.box_search').html('');
    $('#input_search').val('');

});

$(document).on('click', '#convertPoints', function (e) {

    e.preventDefault();

    $('#convertPoints').hide();
    $('#loaderPrivilege').show();

    $.ajax({
        url: '../../ajax/ajax-convertCachBack.php',
        type: 'GET',
        data: {
            lang: $('input[name=lang]').val()
        },
        success: function (data) {

            setTimeout(() => {
                $('#loaderPrivilege').hide();
            }, 900);

            setTimeout(() => {

                var res = JSON.parse(data);

                if (res.success == true) {

                    $('#message_privilege .message_icone').html(res.icone);
                    $('#message_privilege .message_content').html(res.message);
                    if (res.message2 != "") $('.message_content_2').html(res.message2);
                    $('#message_privilege').removeClass('alert-danger').addClass('alert-success');
                    $('#message_privilege').attr('style', 'display: block !important');

                } else {

                    $('#message_privilege .message_icone').html(res.icone);
                    $('#message_privilege .message_content').html(res.message);
                    $('#message_privilege').removeClass('alert-success').addClass('alert-danger');
                    $('#message_privilege').attr('style', 'display: block !important');

                }

            }, 1200);

        }

    })


})

$(document).on('click', '.cart_redirect', function (e) {

    var page = $(this).data('page');

    $.ajax({
        url: '../../ajax/ajax-historyCart.php',
        type: 'GET',
        data: {
            page: page
        },
        success: function (data) {}
    })

})

var toggle = $('.plus li').length;

for (let i = 1; i <= toggle; i++) {

    $('#togglePage' + i).on('click', function (e) {

        e.preventDefault();

        var value = $(this).data('toggle');

        $("html, body").animate({
            scrollTop: $('#' + value).offset().top - 110
        }, 'slow');

    })

}