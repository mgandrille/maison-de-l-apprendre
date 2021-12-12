<?php
/**
 * CONFIGURATION
 *
 * @package mda
 */



// Informations about Hello Asso
$clientKey = get_api_key_helloAsso()['key'];
$clientSecret = get_api_key_helloAsso()['secret_key'];
$url = "https://api.helloasso.com/oauth2/token";
$authorizeUrl = 'https://auth.helloasso.com/authorize';
$siteUrl = $_SERVER['HTTP_REFERER'];
$pkce = '';

//Tell cURL where our certificate bundle is located.
// $certificate = "C:\MAMP\cacert.pem";
