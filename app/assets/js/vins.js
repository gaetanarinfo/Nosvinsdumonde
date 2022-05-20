var fichier = [];
var name_file = [];

var fichier2 = [];
var name_file2 = [];

var file_size = 250000;

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
        }
    });
});

$(document).on('click', '.delete_vin', function (e) {

    e.preventDefault();

    var id = $(this).data('id');

    $.ajax({
        url: '../app/ajax/ajax-editVinActive.php',
        type: 'POST',
        data: {
            vinId: id,
            delete: true
        },
        success: function (data) {

            var res = JSON.parse(data);

            if (res.vin == true) {

                $('.tr_' + id).fadeOut();

            }

        }

    })

})

$(document).on('click', '.show_vin', function (e) {

    e.preventDefault();

    var id = $(this).data('id');
    $.ajax({
        url: '../app/ajax/ajax-editVinActive.php',
        type: 'POST',
        data: {
            vinId: id,
            view: true
        },
        success: function (data) {

            var res = JSON.parse(data);

            if (res.vin == true) {

                location.reload();

            }

        }

    })

})

$(document).on('click', '#edit', function (e) {

    $(this).html('<i class="fas fa-pencil fa-sm text-white mr-1" aria-hidden="true"></i> Sauvegarder');
    $(document).find('div.col-lg-6').hide();
    $('#domaine').hide();
    $('#edit_vin').show();
    $(this).attr('id', 'save');

})

$(document).on('click', '#save', function (e) {

    $(this).html('<i class="fas fa-pencil fa-sm text-white mr-1" aria-hidden="true"></i> Éditer');

    var formData = $('#bloc_1').serialize();

    $.ajax({
        url: '../ajax/ajax-blocEdit1.php',
        type: 'POST',
        data: formData,
        success: function (data) {

        }

    })

    var formData2 = $('#bloc_2').serialize();

    $.ajax({
        url: '../ajax/ajax-blocEdit2.php',
        type: 'POST',
        data: formData2,
        success: function (data) {}

    })

    var form = [],
        form_data3 = new FormData(),
        content_fr = $('#content_fr').val(),
        content_en = $('#content_en').val(),
        vin_id = $('input[name=vin_id]').val();

    if (fichier.length == 1) {
        for (let i = 0; i < fichier.length; i++) {

            if ($.inArray(fichier[i].name, name_file) !== -1) form_data3.append('file_' + i, fichier[i]);

        }
    }

    form.forEach(e => {

        if (e.name != "content_fr") form_data3.append(e.name, e.value);

        if (e.name != "vin_id") form_data3.append(e.name, e.value);

        if (e.name != "content_en") form_data3.append(e.name, e.value);

    });

    form_data3.append('vin_id', vin_id);
    form_data3.append('content_fr', content_fr);
    form_data3.append('content_en', content_en);

    $.ajax({
        url: '../ajax/ajax-blocEdit3.php',
        type: 'POST',
        data: form_data3,
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        success: function (data) {}

    })

    var formData4 = $('#bloc_4').serialize();

    $.ajax({
        url: '../ajax/ajax-blocEdit4.php',
        type: 'POST',
        data: formData4,
        success: function (data) {}

    })

    var form2 = [],
        form_data5 = new FormData(),
        vin_id = $('input[name=vin_id]').val();

    if (fichier2.length == 1) {
        for (let i = 0; i < fichier2.length; i++) {

            if ($.inArray(fichier2[i].name, name_file2) !== -1) form_data5.append('file_' + i, fichier2[i]);

        }
    }

    form2.forEach(e => {

        if (e.name != "vin_id") form_data5.append(e.name, e.value);

    });

    form_data5.append('vin_id', vin_id);

    $.ajax({
        url: '../ajax/ajax-blocEdit5.php',
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
                location.href = '/app/vins';
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

$('#delete').on('click', function (e) {

    e.preventDefault();

    var vinId = $('#vinId').val();

    $.ajax({
        url: '../ajax/ajax-editVinActive.php',
        type: 'POST',
        data: {
            vinId: vinId,
            delete: true
        },
        success: function (data) {

            $('#edit_vin').remove();
            $('.container-fluid .row').remove();
            $('.message_icone').html('<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>');
            $('.message_content').html('Le vin a bien été supprimé !');
            $('.message_content_2').html('Il n\'apparaîtra plus sur Nosvinsdumonde.');
            $('#message_vin').removeClass('alert-danger').addClass('alert-success');
            $('#message_vin').attr('style', 'display: block !important');

            setTimeout(() => {
                location.href = '/app/vins';
            }, 1000);

        }
    })


})