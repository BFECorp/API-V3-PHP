<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'm2c',
    'handler' => 'stock',
    'action' => 'list-share-stock',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'warehouse' => 'us',
    'show_all' => 'true',
    'start_index' => 1,
    'count' => 20
);

$api_address = $api_base . join("/", $dispatcher);
#echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
