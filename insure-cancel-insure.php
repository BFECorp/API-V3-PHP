<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'insure',
    'handler' => 'package',
    'action' => 'cancel-insure',
);

$request_data = array(
		'token' => $token,
		'user_key' => $user_key,
		'item_sign' =>  'EMS140414TST000009'	//处理号
    );


$api_address = $api_base . join("/", $dispatcher);
echo $api_address;

$response = rest_helper($api_address, $request_data, 'POST');

echo "<pre>";
print_r($response);
echo "</pre>";
