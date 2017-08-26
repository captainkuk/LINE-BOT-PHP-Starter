<?php
$proxy = 'proxyurl:port';
$proxyauth = 'velodrome.usefixie.com:80';
$access_token = 'h4PeUprC2ByFC3m79hAiCCRMxoTUR/vBZLeEK5PB5PnSoWOLv/Kwv4Lns+oy1WIgD8KBTPaLD/8XHJVQctTi945HDkaPcEJSGGjVeyaiFnE1d6qJyFMaIVC253R6hWc6BWFqfUmSqlCUINd9zR2v4gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
