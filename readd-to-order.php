<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'direct-express',
    'handler' => 'package',
    'action' => 'readd-to-order',
);
$api_address = $api_base . join("/", $dispatcher);

$auth = array(
    'token' => $token,
    'user_key' => $user_key,
);
$post_params = array(
    'package_sn' => 'EUB120418TST000009',
    'order_sn' => 'STST12042400003',
);

$url = $api_address."?".http_build_query($auth); 
echo "<br>Request URL $url <br>";
$response = rest_helper($url, $post_params, 'POST');

echo "<pre>";
print_r($response);
echo "</pre>";
