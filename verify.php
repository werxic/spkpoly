<?php
$access_token = 'pwIlcuXib+mh3MODhEytMPdEmMODfG2vk5kwkqN5ohp7goT5tpxUIsaMr7BJ9jWCzBMcPLl9ckbGCXdOQiRGFuwQfIGqmzkXVzw8roAa4Qcin7TOFza81sENs73iPMezO7izczLrYIBedhDyZfVYzAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
