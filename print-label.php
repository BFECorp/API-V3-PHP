<?php

require "http_request.php";
require "auth.php";

function savePackageLable($packageSns)
{
    $dispatcher = array(
        'category' => 'direct-express',
        'handler' => 'package',
        'action' => 'print-label',
    );
    $request_data = array(
        'token' => getToken(),
        'user_key' => getUserKey(),
        'format' => 'classic_a4',
    );

    $api_address = getApiBaseAddress() . join("/", $dispatcher);
    $api_address .= "?" . http_build_query($request_data);
    $api_address .= get_label_params_string($packageSns, 'package_sn');
    echo $api_address;

    $response = rest_helper($api_address, null, 'GET', 'binary');

    $packageSnsStr = join("-", $packageSns);
    $fd = fopen("label-$packageSnsStr.pdf", 'wb');
    fwrite($fd, $response);
    fclose($fd);
}

$packageSns = array(
    'HBM131223TST000001',
    'HBM131223TST000002',
);

savePackageLable($packageSns); // 参数为要打印标签的包裹处理号
