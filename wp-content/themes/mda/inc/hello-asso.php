<?php
/**
 * HELLO ASSO API
 *
 * @package mda
 */

// Informations about mda
$clientKey = "";
$clientSecret = "";


/**
 * access_api
 * Permits to have authentified access to HelloAsso API
 *
 * @return array $accessToken and $refreshToken
 *
 */
function access_api() {
    global $clientKey, $clientSecret;
    $urlApi = "https://api.helloasso.com/oauth2/token";

    $data = array(
        'grant_type' => 'client_credentials',
        'client_id' => $clientKey,
        'client_secret' => $clientSecret
    );
    $dataFields = http_build_query($data);


    // CURL CALL
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $result = json_decode($result);

    // Get Token Access
    $accessToken = $result->access_token;
    $refreshToken = $result->refresh_token;

    // d(curl_getinfo($ch));
    // d(curl_errno($ch));
    // d(curl_error($ch));

    curl_close($ch);

    return [$accessToken, $refreshToken];

}


