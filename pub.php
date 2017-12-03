<?php
 

  function pubMqtt($topic,$msg){
       
      put("https://api.netpie.io/topic/ich/$topic?retain",$msg);
 
  }
  function getMqttfromlineMsg($lineMsg){
 
	if ($lineMsg === "mode A"){ 	
      $topic = "ich_mode";
      $msg = "A";
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "mode B"){ 	
      $topic = "ich_mode";
      $msg = "B";
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "mode C"){ 	
      $topic = "ich_mode";
      $msg = 3;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "mode D"){ 	
      $topic = "ich_mode";
      $msg = 4;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "bed 1"){ 	
      $topic = "ich_mode";
      $msg = 5;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "bed 0"){ 	
      $topic = "ich_mode";
      $msg = 6;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "liv 1"){ 	
      $topic = "ich_mode";
      $msg = 7;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "liv 0"){ 	
      $topic = "ich_mode";
      $msg = 8;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "kit 1"){ 	
      $topic = "ich_mode";
      $msg = 9;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "kit 0"){ 	
      $topic = "ich_mode";
      $msg = 10;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "fan 1"){ 	
      $topic = "ich_mode";
      $msg = 11;
      pubMqtt($topic,$msg);
    }else if ($lineMsg === "fan 0"){ 	
      $topic = "ich_mode";
      $msg = 12;
      pubMqtt($topic,$msg);
    }
  }
 
function put($url,$tmsg)
{
      
    $ch = curl_init($url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
 
    curl_setopt($ch, CURLOPT_USERPWD, "gQvaVoPmKP63Zma:indmQ2kZcorJMdVjcDDzqnD0b");
     
    $response = curl_exec($ch);
     
    curl_close ($ch);
     
    return $response;
}
 
?>
