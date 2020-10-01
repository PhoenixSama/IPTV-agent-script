<?php
$id=$_GET['id'];
$url="https://webapi.miguvideo.com/gateway/playurl/v3/play/playurl?contId=".$id."&rateType=3&clientId=&channelId=";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1" );
curl_setopt($ch, CURLOPT_HTTPHEADER,array('terminalId:www'));
curl_setopt($ch, CURLOPT_REFERER, "http://m.miguvideo.com/mgs/msite/prd/liveDetail.html?cid=".$id."");
$data=curl_exec($ch);
curl_close($ch);
preg_match('/"url":"(.*?)"/i',$data,$sn);
$playurl=$sn[1];
header('location:'.$playurl);
?>
