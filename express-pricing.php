<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'direct-express',
    'handler' => 'package',
    'action' => 'pricing',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'Packing' => '10*10*10',
    'weight_in_gram'=>'100',
	'Country'=>'US',
	'province'=>'SZ',
	'postcode'=>'123456',
    'arrive'=>'GZ',
	'tracking'=>'false',
	'service'=>'EMS',
);

$api_address = $api_base . join("/", $dispatcher);
//echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";

?>
