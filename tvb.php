<?php
$id = empty($_GET['id']) ? "inews" : trim($_GET['id']);
$info=file_get_contents("https://news.tvb.com/ajax_call/getVideo.php?token=http%3A%2F%2Ftoken.tvb.com%2Fstream%2Flive%2Fhls%2Fmobilehd_".$id.".smil%3Fapp%3Dnews%26feed%26client_ip%3D");
preg_match('/"url":"(.*?)"/i',$info,$sn);
$ts=str_replace('\/','/',$sn[1]);
header('location:'.urldecode($ts));
?>
