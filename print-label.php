<?php

require "http_request.php";
require "auth.php";

function savePackageLable($packageSn)
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
        'package_sn' => $packageSn
    );

    $api_base = getApiBaseAddress();
    $api_address = $api_base . join("/", $dispatcher);

    $response = rest_helper($api_address, $request_data, 'GET', 'binary');

    $fd = fopen("label-$packageSn.pdf", 'wb');
    fwrite($fd, $response);
    fclose($fd);
}

savePackageLable('EUB131202TST000141'); // 参数为要打印标签的包裹处理号
