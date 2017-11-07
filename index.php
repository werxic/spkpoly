<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-02.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = 'a89901877671b7e3c1030fd266ddaf00';
$access_token  = 'pwIlcuXib+mh3MODhEytMPdEmMODfG2vk5kwkqN5ohp7goT5tpxUIsaMr7BJ9jWCzBMcPLl9ckbGCXdOQiRGFuwQfIGqmzkXVzw8roAa4Qcin7TOFza81sENs73iPMezO7izczLrYIBedhDyZfVYzAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('U6c1efc712a4da5f25c3d9e4430bdaedb', 'Hello World !!');

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
