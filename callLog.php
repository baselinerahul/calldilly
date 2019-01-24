<?php
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
if(!empty($data)){
	
	$To = $data->to; 
	$From = $data->from; 
  
  $sid='AC3d1de74dcd2cf7937d48a2f7b3b8ddf5';
	$token='656b0945465986c010729b6a189890fe';
	$url = "https://api.twilio.com/2010-04-01/Accounts/".$sid."/Calls.json?To=".$To."&From=".$From;
	
	$x = curl_init($url );
	curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($x, CURLOPT_USERPWD, "$sid:$token");
	curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$y = curl_exec($x);
	echo $y; 
}else{
 echo $y = json_decode('error');
}
?>
