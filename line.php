<?php



require_once('LINEBotTiny.php');
require('pub.php');

$channelAccessToken = 'zJzB+JIl4LFRGuSDmxB1rN5SFfoL0pPAi9JLo4VPlcuioZ3Z5Uk7KZq3Rw2IKXfczBMcPLl9ckbGCXdOQiRGFuwQfIGqmzkXVzw8roAa4QfxUhwnh2VIWeIaHWwLx7jaetUR5KKGVzU3+37WlPcgDAdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'a89901877671b7e3c1030fd266ddaf00';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':

                    getMqttfromlineMsg($message['text']);
                    if($message['text']=="mode A"){
						$mixmsg = 'คุณกำลังอยู่บ้าน';
					}else if($message['text']=="mode B"){
						$mixmsg = 'คุณไม่อยู่บ้าน';
					}

                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $mixmsg
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
?>
