<?php
    $id = empty($_GET['id']) ? "1" : trim($_GET['id']);
        $POSTURL = 'https://kdtvst.otvcloud.com/supportcloud-gateway-producer/JWT-CLIENT/appAuthNew';
        $postData = 'qy3xU9XTMdGdps3D+TcxUDDCm35H7uIhgxaTLsvkIA8qqYLKQTGALMgaHOOIPtoNxvglydq0aKVp8NZ9c8pF8srZ9pvOEduuY+FkRyeC6GCsP4zs+8Rs/1WGD77bTn4EUtHyUA5Pe/cORTfFOCPAZtAkgGU7tioXVENhgSRKQ7UnO2GZKwA3/ynw2P+y09++IqG5NgUN0bz1XPyZsUgxtuRJD+j44BgeXjFt4+IFR2o=';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $POSTURL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,array( 'Content-Type','text/plain'));
        $data = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($data);
        $key=$json->data->token;
		$GETURL = 'https://kdtvst.otvcloud.com/supportcloud-user-producer/video/programAuthentication?contentId=17&openid=0&contentType=Live&isVip=0&code=163';
	$headers = array(
		'Authorization: '.$key
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GETURL);	 	 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
	$data = curl_exec($ch);
	curl_close($ch);
	$json = json_decode($data);
	$url = $json->data->url;
	$url = preg_replace('/channel.*?\//','channel'.$id.'/',$url);
	header('location:'.$url);
?>
