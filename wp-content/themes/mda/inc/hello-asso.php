<?php
/**
 * HELLO ASSO API
 *
 * @package mda
 */


/**
 * @return array|string
 */
function firstTokens()
{
    global $clientKey, $clientSecret, $url;
    $post = [
        'client_id'     => $clientKey,
        'client_secret' => $clientSecret,
        'grant_type'    => 'client_credentials'
    ];

    $tokens = postCurl($url, $post);
    $refreshToken = $tokens['refresh_token'];

    return getSecondTokens($refreshToken);
}


/**
 * @param string $refreshToken
 * @return array|string
 */
function getSecondTokens(string $refreshToken)
{
    global $clientKey, $url;

    $post = [
        'client_id'     => $clientKey,
        'grant_type'    => 'refresh_token',
        'refresh_token' => $refreshToken
    ];

    $tokens = postCurl($url, $post);
    return $tokens;
}

// d(firstTokens());

function getAuthRequest()
{
    global $clientKey, $authorizeUrl, $siteUrl;

    $pkce = getPKCE();

    $url = $authorizeUrl. '?client_id=' .$clientKey. '&redirect_uri='.$siteUrl.'&code_challenge=' .$pkce. '&code_challenge_method=S256';

    return $url;
}
// d(getAuthRequest());


/**
 * @return string
 */
function getPKCE()
{
    global $pkce;

    if(strlen($pkce) <= 43){

        $authString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~';

        $randString = '';

        for ($i = 0; $i < rand(43, 128); $i++) {
            $randString .= $authString[rand(0, strlen($authString) - 1)];
        }

        $pkceCode = $randString;

        $sha = hash('sha256', $pkceCode);
        $base = base64_encode($sha);
        $urlencode = urlencode($base);

        $pkce = $urlencode;
    }

    return $pkce;

}
// d(getPKCE());

/**
* @param array $post
* @return array|string
*/
function postCurl($url, array $post)
{
    global $certificate;

    $array = http_build_query($post);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
    curl_setopt($ch, CURLOPT_CAINFO, $certificate);
    curl_setopt($ch, CURLOPT_CAPATH, $certificate);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded'));
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    return checkCurlError($response, $error);
}

/**
 * @param $url
 * @param $headers
 * @return array|string
 */
function getCurl($url, $headers)
{
    global $certificate;
    $request = "{$url}";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_RETURNTRANSFER => 1,
        // CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CAINFO => $certificate,
        CURLOPT_CAPATH => $certificate,

    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);


    return checkCurlError($response, $error);
}


/**
 * @param $response
 * @param $error
 * @return array|string
 */
function checkCurlError($response, $error)
{
    $decodeResponse = json_decode($response, true);

    if(!$response || is_null($decodeResponse)){

        if(isset($response['error'])){
            $error = $response['error'];
        }else if(empty($error)){
            $error = 'Unknown error with curl';
        }

        return [ 'error' => $error ];

    }else{

        return $decodeResponse;
    }
}


/**
 * Get all informations of all forms of the API Hello Asso for MDA
 */
function get_forms_infos() {
    $url = "https://api.helloasso.com/v5/organizations/la-maison-de-l-apprendre/forms?states=Public&states=Draft&formTypes=Event&pageIndex=1&pageSize=100";
    $request = "{$url}";
    $token = firstTokens();

    $headers = [
        'Accepts: application/json',
        'Authorization: Bearer '.$token['access_token'],
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
// d(get_forms_infos());
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

            $eventInfo = get_object_vars($event);
            try {
                array_push($eventDatas, $eventInfo);
            }
            catch (Exception $e) {
            }
        }
    }
    // d($eventDatas);
    return $eventDatas;
}
// d(get_articles());
