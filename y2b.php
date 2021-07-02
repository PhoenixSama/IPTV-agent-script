<?php
$id=$_GET['id'];
$url='https://www.youtube.com/watch?v='.$id;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);                  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36" );
curl_setopt($ch, CURLOPT_REFERER, "https://www.youtube.com/watch?v=".$id."");
$info=curl_exec($ch);
curl_close($ch);
$data=urldecode($info);
preg_match('/"hlsManifestUrl":"(.*?)"/i',$data,$playurl);
header('location:'.$playurl[1]);
?>
