<?php

require "http_request.php";
require "auth.php";

$dispatcher = array(
    'category' => 'insure',
    'handler' => 'package',
    'action' => 'add-insure',
);

$request_data = array(
		'token' => $token,
		'user_key' => $user_key,
		/* 投保信息列表 */
		'item_list' =>  json_encode(array	
		(
			'0' => array
			(
				'item_sign' => 'EMS140414TST000009',	//处理号
				'insure_type' => '1',		//投保类型：1 - 交货不到 2 - 交货不到+海关责任
				'insure_rate' => '1.5'	//投保系数 不能超出如下范围：1.0~3.0
			)
        ))
    );


$api_address = $api_base . join("/", $dispatcher);
echo $api_address;

$response = rest_helper($api_address, $request_data, 'POST');

echo "<pre>";
print_r($response);
echo "</pre>";
