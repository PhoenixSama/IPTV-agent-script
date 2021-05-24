<?php
header("Content-Type: application/json; charset=utf-8");
error_reporting(0);
$channel = empty($_GET['id']) ? '126' : trim($_GET['id']);
$bstrURL = 'http://slave.shuliyun.com:13160/account/get_access_token';
$postdata = '{"deviceType":"yuj","deviceno":"C048A58AE8DF52B63F6B81EA94AA4BC18","role":"guest"}';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $bstrURL);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('application/vnd.apple.mpegurl'));
	curl_setopt($ch, CURLOPT_USERAGENT, "okhttp/3.9.1" );
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	$data = curl_exec($ch);
	curl_close($ch);
	preg_match('/"accessToken":"(.*?)"/i',$data,$accessToken); 
    preg_match('/"refreshToken":"(.*?)"/i',$data,$playtoken); 
   $love="http://stream.slave.shuliyun.com:13164/playurl?playtype=live&protocol=hls&accesstoken=".$accessToken[1]."&playtoken=".$playtoken[1]."&programid=4200000".$channel.".m3u8&oldwayreloc=true&relocsrcsrv=";
   header("location: ".$love);
?>
