<?php
header("content-type:text/html;charset=utf-8");

$lid = $_GET["id"];

$authKey = AuthKey($lid);

$FwUrl = 'http://ott.yun.gehua.net.cn:8080/msis/getPlayURL?areaCode=&assetID=&bitRate=&catalogId=&delay=&deviceName=&fmt=&isSeekStatus=&isad=0&playType=2&productCode=&providerID=&resolution=1280*720&resourceCode='.$lid.'&serviceId=&shiftend=&shifttime=&subID=&terminalType=3&timecode=0&userCode=&userName=&version=V001&authKey='.$authKey;

$data = file_get_contents($FwUrl);

$obj = json_decode ($data);

$len = count($obj);

$m3u8 = $obj->bitPlayUrlList[0]->{'url'};

if(strpos($m3u8,'6000.m3u8') !== false)
{
        $m3u8 = $obj->bitPlayUrlList[1]->{'url'};
}

$harr = get_headers($m3u8);

$len = count($harr);

for($i=0;$i<$len;$i++)
{
        $m3u8 = $harr[$i];
       
        if(strpos($m3u8,'Location') !== false)
    {
                $m3u8 = str_replace('Location:','',$m3u8);
               
                $m3u8 = trim($m3u8);
               
                break;
    }
}
header('location:'.$m3u8);


function AuthKey($cid)
{
   $l = 'http://ott.yun.gehua.net.cn:8080/msis/getPlayURL?areaCode=&assetID=&bitRate=&catalogId=&delay=&deviceName=&fmt=&isSeekStatus=&isad=0&playType=2&productCode=&providerID=&resolution=1280*720
&resourceCode=';

   $r = '&serviceId=&shiftend=&shifttime=&subID=&terminalType=3&timecode=0&userCode=&userName=&version=V001';

   $s = 'aidufei';

   $sign = strtolower(MD5($l.$cid.$r.$s));

   return $sign;

}

?>
