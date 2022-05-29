// Scroll nav fiche

var divs = $('#carouselVin'),
    offset = divs.offset(),
    isFirefox = typeof InstallTrigger !== 'undefined';

if ($(window).width() > 768) {

    var num = 0;

    if (isFirefox === true) {

        $(divs).on('wheel', function(e) {

            if (e.originalEvent.deltaY > num) {

                if ($(window).scrollTop() === 0) {

                    $('html,body').stop().animate({
                        scrollTop: $('#produits').offset().top - 120
                    }, 300);

                    return false;

                } else {

                }
            }

        });

    } else {

        $(divs).mousewheel(function(e) {

            if (e.originalEvent.deltaY > num) {

                if ($(window).scrollTop() === 0) {

                    $('html,body').stop().animate({
                        scrollTop: $('#produits').offset().top - 120
                    }, 300);

                    return false;

                }
            }

        });

    }

}