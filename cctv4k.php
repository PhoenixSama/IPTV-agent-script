<?php
        $POSTURL = 'https://ytpaddr.cctv.cn/gsnw/live';
        $postData = array(
                "rate" => "",
                "userId" => "",
                "id" => "Live1566537576625101",
                "clientSign" =>"cctvVideo",
                "systemType" => "android",
                "deviceId" => array(
                        "imei" => "",
                        "serial" => "ABCDEFGHIJKLMNOP",
                        "android_id" => "9774d56d682e549c",
                        )

                );
		$postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $POSTURL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,array( 'Content-Type','application/json'));
		curl_setopt($ch,CURLOPT_USERAGENT, 'cctv_app_tv' ); 
        $data = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($data);
        $key=$json->data->videoList->url;
		echo $key;

		$GETURL = 'https://ytpvdn.cctv.cn/cctvmobileinf/rest/cctv/videoliveUrl/getscreenstream';
	$getData = 'appcommon={"ap":"cctv_app_tv","an":"央视投屏助手","adid":"","av":"1.1.0"}&url=http://live-4k.5club.cctv.cn/live/4K0929.stream/playlist.m3u8';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GETURL);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $getData);
	curl_setopt($ch, CURLOPT_HTTPHEADER ,array( 'Content-Type','application/x-www-form-urlencoded'));
	curl_setopt($ch,CURLOPT_USERAGENT, 'okhttp/3.12.3' ); 
	$data = curl_exec($ch);
	curl_close($ch);
	$json = json_decode($data);
	$url = $json->url;
    header('location:'.$url);
?>
