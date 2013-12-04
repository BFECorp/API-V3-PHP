<?php

function getApiBaseAddress()
{
    $api_base = "http://demo.chukou1.cn/v3/";
    return $api_base;
}

function getToken()
{
    return '887E99B5F89BB18BEA12B204B620D236'; // 请在这里输入您的Token
}
function getUserKey()
{
    return 'wr5qjqh4gj'; //请在这里输入您的UserKey
}

$api_base = getApiBaseAddress();
$token = getToken();
$user_key = getUserKey();
