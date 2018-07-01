<?php
	ini_set('display_errors', 0);
    require_once '/vendor/autoload.php';

	$APIKey = 'AIzaSyDzK2lPe_nn-G0_MjqqO3onyMa_Cx-VAoU';
    $client_id = '928439433174-lqjccd0nesd8k5q3h43g0r3eu4lonrs7.apps.googleusercontent.com';
    $client_secret = 'htguaxov2SggCXSpGdCF14k9';
    $redirect_uri = 'https://developers.google.com/oauthplayground';
                           
    $client = new Google_Client();
    $client->setApplicationName('google-fit');
    $client->setAccessType('online');
    $client->setApprovalPrompt("auto");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);

	$AccessToken =  'GlvrBZjy9f2C5NEiLuUh2JoH_aXRLpmnKDK28VeWn_nF1RZCX_lSZvTTcjDLZ5XeK860okVZ1rriRyvzEQq72p3OnsqfLxGSb0GPjqy7MnUjV7o0pkw2mBbbkdir';
	$Data['aggregateBy'] =array(["dataTypeName"=>'com.google.step_count.delta',"dataSourceId"=>'derived:com.google.step_count.delta:com.google.android.gms:estimated_steps']);
	$Data['bucketByTime']['durationMillis'] =86400000;
	$Data['startTimeMillis'] =1487721600000;
	$Data['endTimeMillis'] =1487772000000;
	$JsonData = json_encode($Data);
	//$ApiUrl = 'https://www.googleapis.com/fitness/v1/users/me/dataset:aggregate?access_token='.$AccessToken;
	$ApiUrl = 'https://www.googleapis.com/fitness/v1/users/me/sessions';
	$Ch = curl_init();
	curl_setopt($Ch, CURLOPT_URL, $ApiUrl);
	curl_setopt($Ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($Ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($Ch, CURLOPT_HEADER, 0);
	curl_setopt($Ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
	curl_setopt($Ch, CURLOPT_GET, 1);
	//curl_setopt($Ch, CURLOPT_POSTFIELDS, $JsonData);
	$Result = curl_exec($Ch);
	curl_close($Ch);
	print_r($Result);
?>