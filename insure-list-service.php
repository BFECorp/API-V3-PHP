﻿<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'insure',
    'handler' => 'misc',
    'action' => 'list-all-service',
);

$request_data = array(
		'token' => $token,
		'user_key' => $user_key
    );


$api_address = $api_base . join("/", $dispatcher);
echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
