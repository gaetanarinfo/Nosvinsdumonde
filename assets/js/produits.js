var count = 1;

$('#show_produits').on('click', function (e) {

    e.preventDefault();

    $('#show_produits').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

    setTimeout(() => {
        callData(count);
        count++;
    }, 1200);

})

function callData(counter) {

    var url = "/ajax/ajax-produits.php",
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
                $('.search_box_produits').append(data);
                $('#show_produits').html($('#showPlus').val());

                if(parseInt($('.countProduits').last().val()) > $('.produits_search').length) $('#show_produits').hide();
                
            }, 500);

        },
        error: function (err) {
            console.log("Error: ", err);
        }
    })

}