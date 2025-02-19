<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

// App Name : EENET2020_MSG
// $access_token = 'nfaeu7GfZamJ+c0pgsj9iB9EPM8HSNQQzT7i1FwsVnKRTokM6GWPD6x5RdjdbFrqpajVQIbr+HJYalqdT/Bw4ffKlN9I4glLNp8VNuPn8a8fB1TZxG7IcDyzs9geSfdZMrgUtfzJhkH3y2y5Vr7zxQdB04t89/1O/w1cDnyilFU=';

// App Name : Test_2020
$access_token = 'giVAN+sxs022hITq9CZn3YymXam9udcCjz6XyiPX5QiMOIkl/21EiyLXZZFlLZZJUm1kih/MIG15yzac79ZH+WDapHOYUTt0/aljgkpDScxZrAIlHDZT9EDXCjUMzQNI9NueDgojxEVopdQwInfoRwdB04t89/1O/w1cDnyilFU='

	
	// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
