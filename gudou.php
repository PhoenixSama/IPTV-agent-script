<?php
header('Content-Type:text/html;charset=UTF-8');
$id=$_GET["id"];

$tokens=token($id);
$urls="http://gslb.gcable.cn:8070/live/".$id.".m3u8?".$tokens;
$urls=parseurl($urls);
echo $urls;
header('location:'.urldecode($urls));
exit;

function parseurl($url){
    preg_match("|(.*)\?|",$url,$aa);
    $uas=parse_url($url);
    parse_str($uas["query"]);
    $urls=$aa[1]."?t=".$t."&u=".$u."&p=".$p."&pid=&cid=".$cid."&d=".$d."&sid=".$sid."&r=".$r."&e=".$e."&nc=".$nc."&a=".$a."&auth_message=".$auth_message."&l=".$l."&errorcode=".$errorcode."&errorReason=".$errorReason."&pd=".$pd."&ip=".$ip."&n=".$n."&v=".$v;
    return $urls;
}
function token($id){
    $url = "http://auth.gcable.cn:8085/AAA/aaa?t=&pid=&cid=598&u=13269185286&p=10&l=001&d=123456&n=".$id."&v=2";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Apache-HttpClient/UNAVAILABLE (java 1.4)');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);

    curl_close($ch);
    preg_match('/aaa\?(.*?)"/',$res,$a);
    return $a[1];
}
?>
