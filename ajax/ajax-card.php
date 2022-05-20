<?php

header('Access-Control-Allow-Origin: https://nosvinsdumonde.com/, https://nosvinsdumonde.fr/');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, X-Auth-Token');

require_once('../paiement/init.php');

try {

    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);

    \Stripe\Stripe::setApiKey("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");

    // This is your real test secret API key.

    header('Content-Type: text/plain; charset=UTF-8');

    //json_encode($json_obj->items[0]->amount)
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => json_encode($json_obj->items[0]->amount),
        'currency' => 'eur',
        'description' => $json_obj->items[0]->description,
    ]);
    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (\Stripe\Exception\CardException $e) {
    // Since it's a decline, \Stripe\Exception\CardException will be caught
    echo 'Status is:' . $e->getHttpStatus() . '\n';
    echo 'Type is:' . $e->getError()->type . '\n';
    echo 'Code is:' . $e->getError()->code . '\n';
    // param is '' in this case
    echo 'Param is:' . $e->getError()->param . '\n';
    echo 'Message is:' . $e->getError()->message . '\n';
} catch (\Stripe\Exception\RateLimitException $e) {
    // Too many requests made to the API too quickly
} catch (\Stripe\Exception\InvalidRequestException $e) {
    // Invalid parameters were supplied to Stripe's API
} catch (\Stripe\Exception\AuthenticationException $e) {
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)
} catch (\Stripe\Exception\ApiConnectionException $e) {
    // Network communication with Stripe failed
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Display a very generic error to the user, and maybe send
    // yourself an email
} catch (Exception $e) {
    // Something else happened, completely unrelated to Stripe
}
