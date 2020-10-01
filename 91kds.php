<?php
$id=$_GET["id"];
$tid=$_GET["tid"];
$info=file_get_contents("http://wx.91kds.cn/key.php");
preg_match('/"livekey":"(.*?)"/i',$info,$sn);
$ts = "http://mlive1.91kds.cn/b9/".$tid.".m3u8?id=".$id."&".$sn[1]."";
header("Location:".$ts);
?>
