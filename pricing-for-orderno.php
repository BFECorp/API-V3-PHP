<?php

require "http_request.php";
require "auth.php";

$ordersign = 'ETST12081000002';
if(isset($_GET['ordersign']))
{
    $ordersign = $_GET['ordersign'];
}

$dispatcher = array(
    'category' => 'outbound',
    'handler' => 'package',
    'action' => 'pricing-for-order-no',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'order_no' => $ordersign,
);

$api_address = $api_base . join("/", $dispatcher);
//echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
