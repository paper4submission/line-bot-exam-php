<?php



require "vendor/autoload.php";

$access_token = 'giVAN+sxs022hITq9CZn3YymXam9udcCjz6XyiPX5QiMOIkl/21EiyLXZZFlLZZJUm1kih/MIG15yzac79ZH+WDapHOYUTt0/aljgkpDScxZrAIlHDZT9EDXCjUMzQNI9NueDgojxEVopdQwInfoRwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '2840d52f8356a455e0905b9639f0cf8d';

$pushID = 'Ub8c0d7a6f77332c47dfcfb6007cd1c6d';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







