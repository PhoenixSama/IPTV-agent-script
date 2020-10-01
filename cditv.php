<?php
$id=$_GET["id"];
$cid=$_GET["cid"];
$url="https://www.cditv.cn/api.php?op=live&type=live&catid=".$cid."&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);	 	 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "https://www.cditv.cn/show-".$cid."-".$id."-1.html");
$data = curl_exec($ch);
header ('location:'.$data);
?>
