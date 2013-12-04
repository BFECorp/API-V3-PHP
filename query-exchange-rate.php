<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'direct-express',
    'handler' => 'misc',
    'action' => 'query-exchange-rate',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'from' => 'aud',
    'to' => 'cny',
);

$api_address = $api_base . join("/", $dispatcher);
#echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
