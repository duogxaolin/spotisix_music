<?php
function clientGoogle(){
    global $duogxaolin;
    // Lấy những giá trị này từ https://console.google.com
    $client_id = ''; // Client ID
    $client_secret = ''; // Client secret
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