// Slider range prix
$('#prix').on('change', function () {

    var value = $(this).val(),
        span = $('.rangePrix');

    span.html(value);

})

// Filter By
$(document).on('click', '.millesime', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#millesime').fadeToggle();

})

$(document).on('click', '.couleur', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#couleur').fadeToggle();

})

$(document).on('click', '.prix', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#prix').fadeToggle();

})

$(document).on('click', '.pays', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#pays').fadeToggle();

})

$(document).on('click', '.region', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#region').fadeToggle();

})

$(document).on('click', '.appellation', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#appellation').fadeToggle();

})

$(document).on('click', '.gout', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#gout').fadeToggle();

})

$(document).on('click', '.alliance', function (e) {

    e.preventDefault();

    $(this).find('i').toggleClass('fa-chevron-right');
    $(this).find('i').toggleClass('fa-chevron-down');
    $('#alliance').fadeToggle();

})

$(document).on('click', '#couleur ul li .bottle', function (e) {

    e.preventDefault();

    var value = $(this).data('value'),
        li = $(this);

    $(document).find('#couleur ul li').removeClass('active');
    li.parent().addClass('active');

    $('#couleurFinal').val(value);

})

$(document).on('click', '#alliance ul li .alliance_item', function (e) {

    e.preventDefault();

    var value = $(this).data('value'),
        li = $(this);

    $(document).find('#alliance ul li').removeClass('active');
    li.parent().addClass('active');

    $('#allianceFinal').val(value);

})

$(document).on('click', '#gout ul li .gout_item', function (e) {

    e.preventDefault();

    var value = $(this).data('value'),
        li = $(this);

    $(document).find('#gout ul li').removeClass('active');
    li.parent().addClass('active');

    $('#goutFinal').val(value);

})

// Load Vin Filter
$.ajax({
    url: '../../ajax/ajax-loadChampagnes.php',
    type: 'GET',
    data: {
        'lang': $('#lang').val()
    },
    success: function (data) {

        setTimeout(() => {
            $('#blocChampagne2').html(data);
        }, 1000);

    }
})

$('#millesime').on('change', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#couleur ul li .bottle').on('click', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $(this).data('value');
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#prix').on('click', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#pays').on('change', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#region').on('change', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#appellation').on('change', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#gout ul li .gout_item').on('click', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $(this).data('value');
    var alliance = $('#allianceFinal').val();

    $('#blocChampagne2').html('<div id="loaderChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

$('#alliance ul li .alliance_item').on('click', function (e) {

    var millesime = $('#millesime').val();
    var couleur = $('#couleurFinal').val();
    var prix = $('#prix').val();
    var pays = $('#pays').val();
    var region = $('#region').val();
    var appellation = $('#appellation').val();
    var gout = $('#goutFinal').val();
    var alliance = $(this).data('value');

    $('#blocChampagne2').html('<div id="loaderloadChampagne" class="lds-ripple"><div></div><div></div></div>');

    // Load Vin Filter
    $.ajax({
        url: '../../ajax/ajax-loadChampagnes.php',
        type: 'GET',
        data: {
            'lang': $('#lang').val(),
            millesime: millesime,
            couleur: couleur,
            prix: prix,
            pays: pays,
            region: region,
            appellation: appellation,
            gout: gout,
            alliance: alliance
        },
        success: function (data) {

            setTimeout(() => {
                $('#blocChampagne2').html(data);
            }, 1000);

        }
    })

})

// Si changement de pays on change de region
$('#pays').on('change', function (e) {

    var value = $(this).val();

    $.ajax({
        url: '../ajax/ajax-changePaysChampagne.php',
        type: 'GET',
        data: {
            pays: value,
            changeRegion: true
        },
        success: function (data) {
            $('#region').html(data);
        }
    })

    $.ajax({
        url: '../ajax/ajax-changePaysChampagne.php',
        type: 'GET',
        data: {
            pays: value,
            changeAppellation: true
        },
        success: function (data) {
            $('#appellation').html(data);
        }
    })

})

// Si changement de region on change de appellation
$('#region').on('change', function (e) {

    var value = $(this).val();
    var pays = $('#pays').val();

    $.ajax({
        url: '../ajax/ajax-changePays.php',
        type: 'GET',
        data: {
            pays: pays,
            changeAppellation: true,
            region: value
        },
        success: function (data) {
            $('#appellation').html(data);
        }
    })

})