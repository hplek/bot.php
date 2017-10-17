<?php
$access_token = 'R6WDXEti6QF2fy/cCru6/ATFjgRij0EsoG7gqfIgSOP0dJa8zxwrHPrrpT6NrFyIwfdlluu6umj1iZZ1+OllRhrVoaOmDA8dJeZsATCI19pON5qmxVfGZU4uxlaYJymgqfAlsrADRmuyjZHUt2GvJwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
