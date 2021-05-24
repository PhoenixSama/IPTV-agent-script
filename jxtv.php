<?php
//手机抓包app江西广电网络
//侧门取源
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'105'; 		
$url = "http://slave.jxtvnet.tv:81/account/get_access_token";
$postdata = '
{
	"deviceType":"yuj",
	"deviceno":"7C73C008925F6A4BBA0C3CEF5E8FBF268",
	"role":"guest"
}';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json; charset=utf-8'));
	curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.0; PRO 5 Build/NRD90M)" );
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    $data = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($data);
    $token = $json->accessToken;
	$bstrURL = 'http://stream.slave.jxtvnet.tv:14311/playurl?accesstoken='.$token.'&playtype=live&protocol=http&playtoken=ABCDEFGH&auth=no&programid=4200000'.$id.'.m3u8';
	
	header('location:'.$bstrURL);

	
?>
