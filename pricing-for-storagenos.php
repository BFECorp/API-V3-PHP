<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'outbound',
    'handler' => 'package',
    'action' => 'pricing-for-storage-nos',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'express_service' => 'USNUS',
    'warehouse' => 'US',
    'destination_type' => 'L',
    'to_zip_code' => '95050',
    'to_region' => 'US',
);

//storage number and count of products
$storage_nos = array(
    array(
        'product' => 'LTST00000629',
        'count' => '3',
    ),
    array(
        'product' => 'LTST00000632',
        'count' => '2',
    ),
);


$api_address = $api_base . join("/", $dispatcher);
$api_address .= "?" . http_build_query($request_data);
$api_address .= get_pricing_params_string($storage_nos, 'storage_no_array');
#echo $api_address;

$response = rest_helper($api_address, null, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
