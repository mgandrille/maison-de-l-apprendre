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
    // d($result);

    // Get Token Access
    $accessToken = $result->access_token;
    $refreshToken = $result->refresh_token;

    // d(curl_getinfo($ch));
    // d(curl_errno($ch));
    // d(curl_error($ch));

    curl_close($ch);

    return [$accessToken, $refreshToken];
}


function refresh_token() {
    global $clientKey;
    $urlApi = "https://api.helloasso.com/oauth2/token";
    $refreshToken = access_api()[1];

    $data = array(
        'grant_type' => 'refresh_token',
        'client_id' => $clientKey,
        'refresh_token' => $refreshToken
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

    return $result;

}

$refreshToken = refresh_token();

// d(access_api(), $refreshToken);


function get_forms_infos() {
    $url = "https://api.helloasso.com/v5/organizations/la-maison-de-l-apprendre/forms?states=Public&formTypes=Event&pageIndex=1&pageSize=30";
    $request = "{$url}";
    $headers = [
        'Accepts: application/json',
        'authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIyMjk1YzhkN2M4ZjA0NDE2YWY4NWFkNjA0Nzk0MDc5YiIsImNwcyI6WyJBY2Nlc3NQdWJsaWNEYXRhIiwiQWNjZXNzVHJhbnNhY3Rpb25zIl0sInVycyI6Ik9yZ2FuaXphdGlvbkFkbWluIiwibmJmIjoxNjA3Mzc4ODIzLCJleHAiOjE2MDczODA2MjMsImlzcyI6Imh0dHBzOi8vYXBpLmhlbGxvYXNzby5jb20iLCJhdWQiOiJkMTgwZWI2MmE2MmI0NmM0OTMxYTYzNzY2NWM3NGQ4MiJ9.Ieu_AjsB8RA4g-sDg3UCBZV_5Gf5qBYnXfXnZyHgEwtWDjlKv91jv39v0C_3QRjT9NaUFqJLTVh04phbqgGAb_LQWWxzQP0HQWLNm6avo-_07TKJqVKcndUzT_uJWJ1X77eXivXVXYhW6_Ekhx-Gdr3OZQ8lPxwUo5mHlnpeOhXRKoVRps5OQAidP7Pnyf6YT8-COLJZctbf4glAqgAcZ8Il_I8k1cYHH7hcFOPLF5j6_u6uCTyZCSFCxkqUajg9_FazAutzqCARc6nZ0bt_UMWIbj8wfqrwj7YQ6bFxNoX9U-8yYHO1UzG0o7pqwPKlNdiiXpeuc7a7_fUhu0Ng9A',
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
    ));

    $response = curl_exec($curl);
    // d($response);
    $error = curl_error($curl);

    curl_close($curl);

    return $results = json_decode($response);
}

function get_articles() {
    $eventDatas = [];
    $today = new DateTime();
    // d($today);

    $events = get_forms_infos()->data;
    // d($events);
    if(!empty($events)) {
        foreach($events as $event) {
            // d(new DateTime($event->endDate));
            // d($event, $event->endDate);
            if(new DateTime($event->endDate) >= $today && $event->formSlug !== 'dejeuners-communaute-4')
            {
                $eventInfo['post_title'] = $event->title;
                $eventInfo['post_content'] = $event->description;
                $eventInfo['startDate'] = $event->startDate;
                $eventInfo['endDate'] = $event->endDate;
                $eventInfo['widgetButtonUrl'] = $event->widgetButtonUrl;
                $eventInfo['state'] = $event->state;
                $eventInfo['post_status'] = 'publish';

                array_push($eventDatas, $eventInfo);
            }
        }
    }

    // d($eventDatas);
    return $eventDatas;
}

