<?php


$strAccessToken = "pwIlcuXib+mh3MODhEytMPdEmMODfG2vk5kwkqN5ohp7goT5tpxUIsaMr7BJ9jWCzBMcPLl9ckbGCXdOQiRGFuwQfIGqmzkXVzw8roAa4Qcin7TOFza81sENs73iPMezO7izczLrYIBedhDyZfVYzAdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "mode 1"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "status : อยู่บ้าน";
 
$servername = "files.000webhost.com";
$username = "ich";
$password = "spkpoly2017";
$dbname = "id3577019_ich";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE ich_channel  SET status=0 WHERE channel=’ch1’";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

 
 
}else if($arrJson['events'][0]['message']['text'] == "mode 2"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "status : ไม่อยู่บ้าน";
}else if($arrJson['events'][0]['message']['text'] == "mode 3"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "status : พักผ่อน";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ยินดีต้อนรับสู่โปรแกรม ICH";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
