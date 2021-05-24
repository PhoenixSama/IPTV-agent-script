<?php
$id=$_GET["id"];
$tid=$_GET["tid"];
$info=file_get_contents("http://m1.91kds.cn/fuck.php");
preg_match('/"livekey":"(.*?)"/i',$info,$sn);
$ts = "http://mlive.91kds.cn/b9/".$tid.".m3u8?id=".$id."&".$sn[1]."";
header("Location:".$ts);
?>
