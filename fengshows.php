<?php

        $id = $_GET['id']-1; // 1=凤凰资讯 2=凤凰中文 3=凤凰香港
        $bstrURL = 'https://m.fengshows.com/api/v3/live?live_type=tv&page=1&page_size=15';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $bstrURL);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($data);
        $url = $json[$id]->live_url_fhd;
        $aryList = parse_url($url);
        $substring = str_replace('.flv','', $aryList['path']);
        $hexTime = dechex(time() + 1800);
        $hash = md5('obb9Lxyv5C'.$substring.$hexTime);
        $url = $url.'?txSecret='.$hash.'&txTime='.$hexTime;
        header('location:'.$url);

?>
