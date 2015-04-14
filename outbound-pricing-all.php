<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'outbound',
    'handler' => 'package',
    'action' => 'pricing-all',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'warehouse' => 'US',
    'destination_type' => 'L',
    'to_zip_code' => '95050',
    'to_region' => 'US',
	'packing' => '10*10*10',
	 'weight_in_gram' => '50',
);

$api_address = $api_base . join("/", $dispatcher);
//echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";

?>
