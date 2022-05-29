var count = 1;

$('#show_news').on('click', function (e) {

    e.preventDefault();

    $('#show_news').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

    setTimeout(() => {
        callData(count);
        count++;
    }, 1200);

})

function callData(counter) {

    var url = "/ajax/ajax-actualites.php",
    lang = $('#lang').val();

    $.ajax({
        url: url,
        type: "POST",
        data: {
            offset: counter,
            lang: lang
        },
        success: function (data) {

            setTimeout(() => {
                $('.lds-rings').css('visibility', 'hidden');
                $('.lds-rings').css('margin', '0 0');
            }, 300);

            setTimeout(() => {
                $('.search_box_actualites').append(data);
                $('#show_news').html($('#showPlus').val());

                if(parseInt($('.countActualites').last().val()) > $('.actualites_search').length) $('#show_news').hide();
                
            }, 500);

        },
        error: function (err) {
            console.log("Error: ", err);
        }
    })

}