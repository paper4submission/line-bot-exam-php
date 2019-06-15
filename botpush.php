<?php



require "vendor/autoload.php";

// for App name : EENET2019_MSG
$access_token = '/uI+6i00zwm0cpsR2sS6FL5ywLmrj5Bpb/xoG5Yfw4/dJGXbsablO30bet7BByR8lp30Xx0hgrKpoxGEEMwNobIlzQO8DGEpaWLvTNXCILXsxj5hw14+ZYAy1II0lFI3tp3xGelMW7hQuxM2GvzC/AdB04t89/1O/w1cDnyilFU=';

$channelSecret = '1ad759c60ccdc9b2a4d3ac4addad3d87';

$pushID = 'U8b25b0c27039892189efade980b8749a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







