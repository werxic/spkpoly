<?php



require_once('LINEBotTiny.php');
require('pub.php');

$channelAccessToken = 'zJzB+JIl4LFRGuSDmxB1rN5SFfoL0pPAi9JLo4VPlcuioZ3Z5Uk7KZq3Rw2IKXfczBMcPLl9ckbGCXdOQiRGFuwQfIGqmzkXVzw8roAa4QfxUhwnh2VIWeIaHWwLx7jaetUR5KKGVzU3+37WlPcgDAdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'a89901877671b7e3c1030fd266ddaf00';
setcookie("mode_for_D",$mode_D,time()+3600);
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':

                    getMqttfromlineMsg($message['text']);
                    			if($message['text']==="mode A"){
						$mixmsg = 'คุณกำลังอยู่บ้าน';
						$mode_D = 4;
					}else if($message['text']==="mode B"){
						$mixmsg = 'คุณไม่อยู่บ้าน';
						$mode_D = 3;
					}else if($message['text']==="mode C"){
						$mixmsg = 'คุณกำลังจะพักผ่อน';
						$mode_D = 2;
					}else if($message['text']==="mode D"){
			    			$mode_D = 1;
			    			$mixmsg = 'คุณกำลังควบคุมด้วยมือ';
					}else if($message['text']==="bed 1"){
						$mixmsg = 'ไฟห้องนอน:เปิด';
					}else if($message['text']==="bed 0"){
						$mixmsg = 'ไฟห้องนอน:ปิด';
					}else if($message['text']==="liv 1"){
						$mixmsg = 'ไฟห้องนั่งเล่น:เปิด';
					}else if($message['text']==="liv 0"){
						$mixmsg = 'ไฟห้องนั่งเล่น:ปิด';
					}else if($message['text']==="kit 1"){
						$mixmsg = 'ไฟห้องครัว:เปิด';
					}else if($message['text']==="kit 0"){
						$mixmsg = 'ไฟห้องครัว:ปิด';
					}else if($message['text']==="fan 1"){
						$mixmsg = 'พัดลมห้องนั่งเล่น:เปิด';
					}else if($message['text']==="fan 0"){
						$mixmsg = 'พัดลมห้องนั่งเล่น:ปิด';
					}else{$mixmsg = 'คุณใช้งานคำสั่งไม่ถูกต้อง';
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
