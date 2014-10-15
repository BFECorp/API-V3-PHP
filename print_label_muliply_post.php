<?php

require "http_request.php";
require "auth.php";

// 参数为要打印标签的包裹处理号列表
$packageSns = array(
	'CGT141014TST000001',
	'CGT141014TST000002',
	'CGT141014TST000002',
	'CGT141014TST000002'
);

$dispatcher = array(
	'category' => 'direct-express',
	'handler' => 'package',
	'action' => 'print-label'
);
$request_data = array(
	'token' => getToken(),
	'user_key' => getUserKey(),
	'format' => 'classic_a4'
);

$api_address = $api_base . join("/", $dispatcher);
$api_address .= "?" . http_build_query($request_data);

echo $api_address;

//echo "<br />";

//echo get_repeat_string_params_string($packageSns, 'package_sn');
//&package_sn=CGT141014TST000001&package_sn=CGT141014TST000002

$post_data = get_repeat_string_params_string($packageSns, 'package_sn');

try
{
	$response = rest_helper($api_address, $post_data, 'POST', 'binary', false);

	$r = json_decode($response);
	  if ($r === null) {
		//throw new Exception("failed to decode $res as json");
		//if not json return, save file
		$file = "label/label-mutiply-post-packageSns.pdf";
		saveFile($file, $response);
		echo "<br />";
		echo "save ok " . $file;
	  }else{
			echo "<pre>";
			print_r($r);
			echo "</pre>";
	  }
}
catch(exception $e)
{
	echo $e;
}


function saveFile($filename, $response)
{
    $fd = fopen($filename, 'wb');
    fwrite($fd, $response);
    fclose($fd);
}


