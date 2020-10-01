<?php
$id=$_GET["id"];
$cid=$_GET["cid"];
$url="https://www.cditv.cn/api.php?op=live&type=live&catid=".$cid."&id=".$id."&videotype=m3u8&fluency=hd&type=playTv&startTime=&password=";
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36" );
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, "https://www.cditv.cn/mobnews/".$cid."/".$id.".html");
	$data = curl_exec($ch);
header('location:'.urldecode($data));
?>
