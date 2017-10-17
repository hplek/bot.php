<?php
$access_token = 'HdFb3n2OGmwyqNijVDMdTj3S952Mo/MfWtdMC5qieGmgwweN6uBq+d6wTLV14P9A9MYU4dGgViJ00h72pBTWQFkffLasm3LStlW/bLnoiq6eeBmgq0shYh7zQuDd5WvpbAd/HYUluriGFOZXQ57+gwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
