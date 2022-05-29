$(document).on('click', '#commentaire', function (e) {
    e.preventDefault();
    $('.comments').fadeToggle();
})

$('#post_comment').submit(function (e) {

    e.preventDefault();

    var form_data = $(this).serialize();

    $('#post_comment').hide();
    $('#load').show();

    $.ajax({
        url: '../../ajax/ajax-postCommentContent.php',
        type: 'POST',
        data: form_data,
        success: function (data) {

            data = JSON.parse(data);

            if (data.success === true) {

                setTimeout(() => {
                    $('#load').hide();
                    $('#message_comment').show();
                }, 600);

            } else {

                setTimeout(() => {
                    $('#load').hide();
                    $('#message_comment_error').show();
                }, 600);

            }


        }
    })

})

$(document).on('click', '.abuse', function (e) {

    e.preventDefault();

    var comment_id = $(this).data('id');

    $('#comment_id').val(comment_id);

})

$('#formAbuse').submit(function (e) {

    e.preventDefault();

    $('#blocAbuseForm').hide();
    $('#loaderAbuse').fadeIn();

    $.ajax({
        url: "../../ajax/ajax-abuseComment.php",
        type: "POST",
        data: $("#formAbuse").serialize(),
        success: function (data) {

            console.log(data);

            setTimeout(() => {
                $('#loaderAbuse').hide();
            }, 900);

            setTimeout(() => {

                var parsed = JSON.parse(data);

                if (parsed.success == true) {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_abuse').removeClass('alert-danger').addClass('alert-success');
                    $('#message_abuse').attr('style', 'display: flex !important');
                    $('#abuseModal .modal-footer').hide();

                } else {

                    $('.message_icone').html(parsed.icone);
                    $('.message_content').html(parsed.message);
                    $('#message_abuse').removeClass('alert-success').addClass('alert-danger');
                    $('#message_abuse').attr('style', 'display: flex !important');

                    setTimeout(() => {
                        $('#blocAbuseForm').show();
                        $('#abuseModal .modal-footer').show();
                        $('#message_avis').removeAttr('style');
                        $('#message_abuse').removeClass('alert-danger').addClass('alert-success');
                    }, 900);

                }

            }, 1200);

        }
    });

});