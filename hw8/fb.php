<?php 

	require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
	  'app_id' => '164458207397902',
	  'app_secret' => '93f4b3cb025bc1c7cdce4390dbe60f61',
	  'default_graph_version' => 'v2.5',
	]);
	$fb->setDefaultAccessToken('EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD');
	#use My\Full\Classname
	date_default_timezone_set('America/Los_Angeles');















	$type='';
	$url='';
	$keyword='';
	if(isset($_GET['type'])){
		$keyword=$_GET['query'];
		$type=$_GET['type'];
		if($type=="event"){
				$url="/search?q=".$keyword."&type=".$type."&fields=id,name,picture.width(700).height(700),place";
		}
		if($type=="place"){
			if(!empty($_GET['lat'])){
				$url="/search?q=".$keyword."&type=".$type."&center=".$_GET['lat'].",".$_GET['lon']."&distance=1000&fields=id,name,picture.width(700).height(700)";
				//echo $url;
			}
			else{
				$url="/search?q=".$keyword."&type=".$type."&fields=id,name,picture.width(700).height(700)";
			}
		}
		else{
			$url="/search?q=".$keyword."&type=".$type."&fields=id,name,picture.width(700).height(700)";
		}
		try {
			$response = $fb->get($url, 'EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD');
		} 
		catch(Facebook\Exceptions\FacebookResponseException $e) {
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} 
		catch(Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		$result = $response->getGraphEdge();
		$decoded = json_decode($result);
		$decoded = json_encode($decoded);
		echo $decoded;
	}
	
	else if(isset($_GET['id'])){
			$albumurl="/".$_GET['id']."?fields=id,name,picture.width(700).height(700),albums.limit(5){name,photos.limit(2){name, picture}},posts.limit(5)";
			//echo $albumurl;
			try {
				$response = $fb->get($albumurl, 'EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD');
			} 
			catch(Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
			} 
			catch(Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			$result = $response->getGraphNode();
			$decoded = json_decode($result);
			$decoded = json_encode($decoded);
			echo $decoded;
	}
?>