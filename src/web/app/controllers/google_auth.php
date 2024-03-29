<?php
function clientGoogle(){
    global $duogxaolin;
    // Lấy những giá trị này từ https://console.google.com
    $client_id = '302724858909-njg3ofp1k90bbc190ocq2l86s96quca4.apps.googleusercontent.com'; // Client ID
    $client_secret = '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'; // Client secret
    $redirect_uri = $duogxaolin->home_url().'/google/api/login'; // URL tại Authorised redirect URIs
    $client = new Google\Client;
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope('email');
    $client->addScope('profile');
    return $client;
}
$google = clientGoogle();
$google_service = new Google\Service\Oauth2($google);