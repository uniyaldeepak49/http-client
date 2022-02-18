<?php

include 'classes/Http.php';

use HttpClient\Http;

$httpObj = new http();

$httpObj->setUrl("https://corednacom.corewebdna.com/assessment-endpoint.php");

$httpObj->setRequestMethod('POST');

$httpObj->setPayLoad([
    'name' => 'Deepak Uniyal',
    'email' => 'spamwelcomedhere@gmail.com',
    'url' => 'https://github.com/uniyaldeepak49/http-client'
]);

$httpObj->setHeaders([
    'Content-type: application/json',
    'Authorization: Bearer d417fcbc-94b7-4357-aff3-536c33364428'
]);

$httpObj->setOptions();
$httpObj->makeRequest();
var_dump($httpObj->getResponseHeaders());
echo '<pre>';
print_r($httpObj->getResponseHeaders());
echo '</pre>';
