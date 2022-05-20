$(document).ready(function () {

    var prod = "pk_live_51KzdX2G7I4YqAeTDlMmWjpKfyq34OQnD2N7GZDpeEzu5XUwNHVUtBdilhRgOp2aFHAfigZT7RlJizNG7xHULJKWq008dVqDZLn";
    var stripe;
    var api;
    var amount = $('#total').val();
    var description = $('#description').val();
    var purchase = [];

    api = prod;

    purchase = {
        items: [{
            id: "1",
            amount: parseInt(amount),
            description: description
        }]
    };

    // A reference to Stripe.js initialized with your real test publishable API key.
    stripe = Stripe(api);

    // Disable the button until we have Stripe set up on the page
    document.querySelector("#submit_card").disabled = true;

    fetch("../../ajax/ajax-card.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(purchase)
        })
        .then(function (result) {
            return result.json();
        }).catch(function (error) {
            console.log(error);
        })
        .then(function (data) {

            var elements = stripe.elements();
            var card = elements.create("card", {
                //style: style
            });

            // Stripe injects an iframe into the DOM

            card.mount("#card-element");

            card.on("change", function (event) {

                // Disable the Pay button if there are no card details in the Element
                document.querySelector("#submit_card").disabled = event.empty;

                // Disable the Pay button if there are no card details in the Element
                document.querySelector("#submit_card").disabled = event.empty;

            });

            $(document).on('submit', '#payment-form', function (event) {
                event.preventDefault();
                // Complete payment when the submit button is clicked
                payWithCard(stripe, card, data.clientSecret);
            })


        }).catch(function (error) {
            console.log(error);
        });

    // Calls stripe.confirmCardPayment
    // If the card requires authentication Stripe shows a pop-up modal to
    // prompt the user to enter authentication details without leaving your page.
    var payWithCard = function (stripe, card, clientSecret) {

        //Show a success message within this page, e.g.
        $("#after_paiement").hide();

        $('#loaderpaiement').show();

        setTimeout(() => {
            $("#check_list2").fadeIn(600);
        }, 200);

        stripe
            .confirmCardPayment(clientSecret, {
                // receipt_email: $('input[name=email]').val(),
                payment_method: {
                    card: card
                }
            })
            .then(function (result) {

                if (result.error) {
                    // Show error to your customer

                    if (result.error.type == "card_error") {

                        if (result.error.payment_method != undefined) {
                            showError(result.error.payment_method['id'], result.error.payment_method['code']);
                        } else {
                            showError2(result.error.code);
                        }

                    } else if (result.error.type == "invalid_request_error") {

                        showError3(result.error.payment_method['id'], result.error.payment_method['code']);

                    } else if (result.error.type == "api_error") {

                        showError4(result.error.payment_method['id'], result.error.payment_method['code']);

                    }


                } else {

                    // The payment succeeded!
                    orderComplete(result.paymentIntent.id, result.paymentIntent.status);
                }
            });
    };

    /* ------- UI helpers ------- */
    // Shows a success message when the payment is complete
    var orderComplete = function (paymentIntentId, status) {

        $.ajax({
            url: "../../ajax/ajax-paiementSuccessful.php",
            method: 'POST',
            data: {
                origin: "stripe",
                transaction_id: paymentIntentId,
                statut_transaction: status,
                giftMessage: $('#giftMessage').val(),
                total: $('#total').val(),
                port: $('#port').val(),
                point: $('#point').val(),
                lang: $('input[name=lang]').val()
            },
            cache: false,
            success: function (data) {

                location.href = '/' + $('input[name=lang]').val() + '/panier/4';

            }

        });

    };

    // Show the customer the error from Stripe if their card fails to charge
    var showError = function (paymentIntentId, status) {

        $.ajax({
            url: "../../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                token: $('input[name=token]').val(),
                origin: "stripe",
                transaction_id: "",
                statut_transaction: "CANCELED",
                giftMessage: $('#giftMessage').val(),
                total: $('#total').val(),
                port: $('#port').val(),
                point: $('#point').val(),
                lang: $('input[name=lang]').val()
            },
            cache: false,
            success: function (data) {
                
                $('#loaderpaiement').hide();
                $('#choice_methode').hide();
                $("#error").show();

            }

        });

    };

    var showError2 = function () {

        $.ajax({
            url: "../../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                token: $('input[name=token]').val(),
                origin: "stripe",
                transaction_id: "",
                statut_transaction: "CANCELED",
                giftMessage: $('#giftMessage').val(),
                total: $('#total').val(),
                port: $('#port').val(),
                point: $('#point').val(),
                lang: $('input[name=lang]').val()
            },
            cache: false,
            success: function (data) {

                $('#loaderpaiement').hide();
                $('#choice_methode').hide();
                $("#error").show();

            }

        });

    };

    var showError3 = function () {

        $.ajax({
            url: "../../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                token: $('input[name=token]').val(),
                origin: "stripe",
                transaction_id: "",
                statut_transaction: "CANCELED",
                giftMessage: $('#giftMessage').val(),
                total: $('#total').val(),
                port: $('#port').val(),
                point: $('#point').val(),
                lang: $('input[name=lang]').val()
            },
            cache: false,
            success: function (data) {

                $('#loaderpaiement').hide();
                $('#choice_methode').hide();
                $("#error").show();

            }

        });

    };

    var showError4 = function () {

        $.ajax({
            url: "../../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                token: $('input[name=token]').val(),
                origin: "stripe",
                transaction_id: "",
                statut_transaction: "CANCELED",
                giftMessage: $('#giftMessage').val(),
                total: $('#total').val(),
                port: $('#port').val(),
                point: $('#point').val(),
                lang: $('input[name=lang]').val()
            },
            cache: false,
            success: function (data) {

                $('#loaderpaiement').hide();
                $('#choice_methode').hide();
                $("#error").show();

            }

        });

    };

});