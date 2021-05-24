<?php
$url="https://www.1905.com/api/live/home_live_cctv6.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$data = curl_exec($ch);
preg_match("/url=\"([^\"]+)\" hdurl=/",$data,$matches);
$playurl=$matches[1];
header('Location: '.$playurl);
?>
