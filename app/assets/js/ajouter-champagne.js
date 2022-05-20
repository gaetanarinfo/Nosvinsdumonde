var fichier = [];
var name_file = [];

var fichier2 = [];
var name_file2 = [];

var file_size = 250000;

$(document).on('change', '#cepages_active', function (e) {

    if ($(this).val() == "1") {
        $('.cepagesBoisson').show();
    } else {
        $('.cepagesBoisson').hide();
    }

})

$(document).on('click', '#save', function (e) {

    $('#save').hide();

    var formData = $('#bloc_1').serialize();

    $.ajax({
        url: '../app/ajax/ajax-blocAdd1C.php',
        type: 'POST',
        data: formData,
        success: function (data) {}

    })

    var formData2 = $('#bloc_2').serialize();

    $.ajax({
        url: '../app/ajax/ajax-blocAdd2C.php',
        type: 'POST',
        data: formData2,
        success: function (data) {}

    })

    var form = [],
        form_data3 = new FormData(),
        content_fr = $('#def_content_fr').val(),
        content_en = $('#def_content_en').val();

    if (fichier.length == 1) {
        for (let i = 0; i < fichier.length; i++) {

            if ($.inArray(fichier[i].name, name_file) !== -1) form_data3.append('file_' + i, fichier[i]);

        }
    }

    form.forEach(e => {

        if (e.name != "content_fr") form_data3.append(e.name, e.value);
        if (e.name != "content_en") form_data3.append(e.name, e.value);

    });

    form_data3.append('content_fr', content_fr);
    form_data3.append('content_en', content_en);

    $.ajax({
        url: '../app/ajax/ajax-blocAdd3C.php',
        type: 'POST',
        data: form_data3,
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        success: function (data) {

            console.log(data);

        }

    })

    var formData4 = $('#bloc_4').serialize();

    $.ajax({
        url: '../app/ajax/ajax-blocAdd4C.php',
        type: 'POST',
        data: formData4,
        success: function (data) {}

    })

    var form2 = [],
        form_data5 = new FormData();

    if (fichier2.length == 1) {
        for (let i = 0; i < fichier2.length; i++) {

            if ($.inArray(fichier2[i].name, name_file2) !== -1) form_data5.append('file_' + i, fichier2[i]);

        }
    }

    $.ajax({
        url: '../app/ajax/ajax-blocAdd5C.php',
        type: 'POST',
        data: form_data5,
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        success: function (data) {

            var res = JSON.parse(data);

            if (res.user == true) {

                $('#edit_vin').hide();
                $('.container-fluid .row').hide();
                $('.message_icone').html(res.icone);
                $('.message_content').html(res.message);
                if (res.message2 != "") $('.message_content_2').html(res.message2);
                $('#message_vin').removeClass('alert-danger').addClass('alert-success');
                $('#message_vin').attr('style', 'display: block !important');

            } else {

                $('#edit_vin').show();
                $('.container-fluid .row').show();
                $('.message_icone').html(res.icone);
                $('.message_content').html(res.message);
                if (res.message2 != "") $('.message_content_2').html(res.message2);
                $('.message_back').html(res.back);
                $('#message_profil').removeClass('alert-success').addClass('alert-danger');
                $('#message_profil').attr('style', 'display: block !important');

            }

            setTimeout(() => {
                location.href = '/app/champagnes';
            }, 1000);

        }

    })

})

$('#domaine_img').on('change', function (e) {

    let that = e.currentTarget

    if (name_file.length < 2) {

        $.each($('#domaine_img').prop('files'), (index, item) => {
            fichier.push(item);
        })

        for (i = 0; i < fichier.length; i++) {

            if (name_file.length < 2) {

                if (fichier[i].size < file_size) {

                    if (name_file.indexOf(fichier[i].name) == -1) {

                        $('.error_1').hide();

                        name_file.push(fichier[i].name);

                        var number_span = $('.div_img div').length;

                        let reader = new FileReader();

                        reader.onload = (e) => {

                            const image = new Image();

                            image.src = e.target.result;
                            image.onload = () => {

                                if (image.width <= 800 && image.height <= 800) {
                                    $('.prev_image_1').show();
                                    $('.prev_image_1').html('<div class="div_img" id="' + number_span + '"><img class="img-fluid mt-3 mb-4 rounded shadow" style="width: 100%;" data-fancybox src="' + e.target.result + '"/>');

                                    $('label[for="domaine_img"]').hide();

                                } else {

                                    name_file = [];
                                    fichier = [];

                                    $('label[for="domaine_img"]').show();
                                    $('.error_1').show();
                                    $('.error_1').text('L\'image ne correspond pas aux dimensions spécifiées.');

                                }

                            };

                        }

                        reader.readAsDataURL(that.files[0]);

                    }

                } else {

                    $('.error_1').show();
                    $('.error_1').text('Le fichier est trop volumineux.');

                }

            }
        };

    }

});

$('#vin_img').on('change', function (e) {

    let that = e.currentTarget

    if (name_file2.length < 2) {

        $.each($('#vin_img').prop('files'), (index, item) => {
            fichier2.push(item);
        })

        for (i = 0; i < fichier2.length; i++) {

            if (name_file2.length < 2) {

                if (fichier2[i].size < file_size) {

                    if (name_file2.indexOf(fichier2[i].name) == -1) {

                        $('.error_2').hide();

                        name_file2.push(fichier2[i].name);

                        var number_span = $('.div_img div').length;

                        let reader = new FileReader();

                        reader.onload = (e) => {

                            const image = new Image();

                            image.src = e.target.result;
                            image.onload = () => {

                                if (image.width <= 800 && image.height <= 800) {

                                    $('.prev_image_2').show();
                                    $('.prev_image_2').html('<div class="div_img" id="' + number_span + '"><img class="img-fluid mt-3 mb-4 rounded shadow" style="width: 100%;" data-fancybox src="' + e.target.result + '"/>');

                                    $('label[for="vin_img"]').hide();

                                } else {

                                    name_file2 = [];
                                    fichier2 = [];

                                    $('label[for="vin_img"]').show();
                                    $('.error_2').show();
                                    $('.error_2').text('L\'image ne correspond pas aux dimensions spécifiées.');

                                }

                            };

                        }

                        reader.readAsDataURL(that.files[0]);

                    }

                } else {

                    $('.error_2').show();
                    $('.error_2').text('Le fichier est trop volumineux.');

                }

            }
        };

    }

});