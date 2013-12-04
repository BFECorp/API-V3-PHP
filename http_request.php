<?php

function rest_helper($url, $params = null, $verb = 'GET', $format = 'json')
{
  $cparams = array(
    'http' => array(
      'method' => $verb,
      'ignore_errors' => true
    )
  );
  if ($params !== null) {
    $params = http_build_query($params);
    if ($verb == 'POST') {
      $cparams['http']['header'] = "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($params) . "\r\n";
      $cparams['http']['content'] = $params;
        //echo "<pre>";
        //print_r($cparams);
        //echo "</pre>";
    } else {
      $url .= '?' . $params;
      echo "<br>Request GET URL: $url!<br>";
    }
  }

  $context = stream_context_create($cparams);
  $fp = fopen($url, 'rb', false, $context);
  if (!$fp) {
    $res = false;
  } else {
    // If you're trying to troubleshoot problems, try uncommenting the
    // next two lines; it will show you the HTTP response headers across
    // all the redirects:
    // $meta = stream_get_meta_data($fp);
    // var_dump($meta['wrapper_data']);
    $res = stream_get_contents($fp);
  }

  if ($res === false) {
    throw new Exception("$verb $url failed: $php_errormsg");
  }

  switch ($format) {
    case 'json':
      $r = json_decode($res);
      if ($r === null) {
        throw new Exception("failed to decode $res as json");
      }
      return $r;

    case 'xml':
      $r = simplexml_load_string($res);
      if ($r === null) {
        throw new Exception("failed to decode $res as xml");
      }
      return $r;
  }
  return $res;
}

function get_pricing_params_string($params, $name)
{
    //echo "<pre>";
    //print_r($params);
    //echo "</pre>";
    $result = '';
    foreach($params as $item)
    {
        $result .= "&" . $name . "=";
        $result .= urlencode($item['product']) . "*" . $item['count'];
    }
    //echo "<br>pricing params string is $result <br>";
    return $result;
}
