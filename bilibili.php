<?php
$id=$_GET["id"];
$url="https://api.live.bilibili.com/room/v1/Room/playUrl?platform=h5&device=wp&expire=0&build=&mid=1&qn=4&npcybs=0&cid=".$id."&otype=json&appkey=&buvid=infoc&ts=&access_key=&sign=";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
     curl_setopt($ch, CURLOPT_USERAGENT, "Bilibili UWP Client/2.13.7.0 (atelier39@outlook.com)" );
     $data = curl_exec($ch);
     curl_close($ch);
preg_match('/"url":"(.*?)"/i',$data,$sn);
$ts=str_replace('\u0026','&',$sn[1]);
header("Location:".$ts);
?>
