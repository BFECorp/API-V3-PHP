<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'system',
    'handler' => 'tracking',
    'action' => 'get-tracking',
);

$request_data = array(
    'token' => $token,
    'user_key' => $user_key,
	//以下参数同一时间只能使用一种
    'track_no' => '123456'	//供应商轨迹号
    //'package_sn' => 'CRN120924TST000002'  //出口易处理号
);

$api_address = $api_base . join("/", $dispatcher);
#echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
