<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'direct-express',
    'handler' => 'misc',
    'action' => 'list-all-service',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
    'warehouse' => 'us'	//us,uk,au,de
);

$api_address = $api_base . join("/", $dispatcher);
echo $api_address;

try
{
$response = rest_helper($api_address, $request_data, 'GET');
}
catch(exception $e)
{
	echo $e;
}

echo "<pre>";
print_r($response);
echo "</pre>";

?>
