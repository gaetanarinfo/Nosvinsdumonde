var request_search_produits = null;

// Search box
$('#search_input').on('keyup', function (e) {
    console.log($(this).val());
    if ($(this).val().length > 1) {
        checkSearch($(this));
    } else {
        $('.box_search').html('');
        $('#search_box').hide();
    }

})

function checkSearch(data) {

    var search = data.val();

    if (search.length > 1) {

        if (request_search_produits != null) request_search_produits.abort();

        request_search_produits = $.ajax({
            url: 'https://nosvinsdumonde.com/app/ajax/ajax-searchBox.php',
            cache: false,
            data: {
                search: search
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
    }

}