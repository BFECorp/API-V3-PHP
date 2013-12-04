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
	//���²���ͬһʱ��ֻ��ʹ��һ��
    'track_no' => '123456'	//��Ӧ�̹켣��
    //'package_sn' => 'CRN120924TST000002'  //�����״����
);

$api_address = $api_base . join("/", $dispatcher);
#echo $api_address;

$response = rest_helper($api_address, $request_data, 'GET');

echo "<pre>";
print_r($response);
echo "</pre>";
