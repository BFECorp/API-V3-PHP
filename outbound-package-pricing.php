<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'outbound',
    'handler' => 'package',
    'action' => 'pricing',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'express_service' => 'USNUS',
    'warehouse' => 'US',
    'destination_type' => 'L',
    'packing' => '10*10*10',
    'weight_in_gram' => '100',
    'to_region' => 'US',
    'to_zip_code' => '412333',
);

$api_address = $api_base . join("/", $dispatcher);
//echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
