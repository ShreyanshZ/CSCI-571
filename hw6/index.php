<?php require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '164458207397902',
  'app_secret' => '93f4b3cb025bc1c7cdce4390dbe60f61',
  'default_graph_version' => 'v2.5',
]);
$fb->setDefaultAccessToken('EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD');
#use My\Full\Classname
date_default_timezone_set('America/Los_Angeles');



?>

<!Doctype html>

<?php 
	
?>


<html>
    <head>
	<style>
		.description tr,td,th{
			border-spacing:0;
			//border:1px solid black;
			
		}
		.description{
			border-collapse: collapse;
		}
		
		#albums {
			margin-top:20px;
			display:none;
		}

		#posts {
			margin-top:20px;
			display:none;
		}
	</style>
    <script>
		function clearEverything(){
			/*
			document.getElementById('keyword').value="";
			document.getElementById('address').value="";
			document.getElementById('distance').value="";
			document.getElementById('selectoption').selectedIndex=0;*/
			window.location.href="http://cs-server.usc.edu:57690/hw6/index.php";
		}
	
	
        function showDiv(elem){
            if(elem){
                console.log(elem);
                locValue = document.getElementById("loc").value;
                if(elem.value ==locValue){
                    document.getElementById('hidden_div').style.display = "block";
                    document.getElementById('placevalue').required=true;
                    document.getElementById('distancevalue').required=true;
                }
                else{
                    document.getElementById('hidden_div').style.display = "none";
                    document.getElementById('placevalue').required=false;
                    document.getElementById('distancevalue').required=false;
                }
            }
            else{
                document.getElementById('hidden_div').style.display = "none";
                document.getElementById('placevalue').required=false;
                document.getElementById('distancevalue').required=false;
            }
        }
		
		function myFunction() {
			var x = document.getElementById('albums');
			var xvalue=window.getComputedStyle(x, null).getPropertyValue("display");
			if (xvalue == 'none') {
				x.style.display = 'block';
				var y = document.getElementById('posts');
				var yvalue=window.getComputedStyle(x, null).getPropertyValue("display");
				if(yvalue == 'block'){
					y.style.display='none';
				}
			} 
			else {
				x.style.display = 'none';
			}
		}

		function myFunction1() {
			var x = document.getElementById('posts');
			var xvalue=window.getComputedStyle(x, null).getPropertyValue("display");
			if (xvalue == 'none') {
				x.style.display = 'block';
				var y = document.getElementById('albums');
				var yvalue=window.getComputedStyle(x, null).getPropertyValue("display");
				if(yvalue == 'block'){
					y.style.display='none';
				}
			} 
			else {
				x.style.display = 'none';
			}
		}
		
		
		
    </script>
    </head>
    <body>
	<br/><br/>
	<?php 
		$ipkeyword="";
		$iptype="";
		$iplocation="";
		$ipdistance="";
		if(isset($_POST['Search'])){
			$ipkeyword = $_POST['keyword'];
			$iptype = $_POST['type'];
			if($iptype=="place"){
				$iplocation = $_POST['address'];
				$ipdistance = $_POST['distance'];
			}
		}
		if(isset($_GET['id'])){
			$ipkeyword = $_GET['keyword'];
			$iptype = $_GET['type'];
			if($iptype=="place"){
				$iplocation = $_GET['address'];
				$ipdistance = $_GET['distance'];
			}
		}
		
	
	?>
	<?php
		
	
	?>
	
	
	
	
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<center>
			<table bgcolor="#F3F3F3" style="width:600px;border:2px solid #E5E5E5;">
			<tr> <td colspan=2 style="border-top:none;border-left:none;border-right:none;border-bottom:1px solid #E5E5E5;font-size:25px;"><center><i>Facebook Search</i></center></td></tr>
				<tr style="border:none;">
					<td width=9% style="border:none;">Keyword</td>
					<td style="border:none;"><input type="text" id="keyword" name="keyword" value="<?php echo $ipkeyword;?>" required></input></td>
				</tr>
				<tr style="border:none;">
					<td width=9% style="border:none;">Type:</td>
					<td style="border:none;">
						<select name="type" id="selectoption" onchange="showDiv(this)">
							<option value="user" <?php if($iptype == 'user') echo "selected "?>>Users</option>
							<option value="page" <?php if($iptype == 'page') echo "selected "?>>Pages</option>
							<option value="event" <?php if($iptype == 'event') echo "selected "?>>Events</option>
							<option id="loc" value="place" <?php if($iptype == 'place') echo "selected "?>>Places</option>
							<option value="group" <?php if($iptype == 'group') echo "selected "?>>Groups</option>
						</select>
					</td>
				</tr>
				<tr style="border:none;">
					<td width=9% style="border:none;"></td>
					<td style="border:none;"><div id="hidden_div" <?php if($iptype=='place'){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>Location<input type="text"  name="address" id="address" <?php if($iptype=='place'){echo "value=$iplocation";}?>></input>Distance(meters)<input type="text"  name="distance" id="distance" <?php if($iptype=='place'){echo "value=$ipdistance";}?>></input></td></div>
				</tr>
				<tr style="border:none;">
					<td style="border:none;"></td>
					<td style="border:none;">	<input type="submit" name="Search" value="Search"></input>	<input type="button" value="Clear" onclick="clearEverything()"></input></td>
				</tr>
				
			</table>
		</center>
    </form>
	<br/>
	<center>
	<?php
	$url="";
		if(isset($_POST['Search'])) 
		{ 
			$keyword = $_POST['keyword'];
			//echo "$keyword<br>";
			$type = $_POST['type'];
			//echo $type;
			if($type=="place"){
				$addressvalue=$_POST['address'];
				$distancevalue=$_POST['distance'];
				if(!empty($addressvalue) && !empty($distancevalue)){
					$buildURL="https://maps.googleapis.com/maps/api/geocode/json?address=".$_POST['address']."&key=AIzaSyCfZXv15AYMIoIJTQuyMrmflTJwPsTsnII";
					$locationDetails=file_get_contents($buildURL);
					//var_export($locationDetails);
					$json = json_decode($locationDetails);
					$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
					$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
					$url="/search?q=".$keyword."&type=".$type."&center=".$_POST['address']."&distance=".$_POST['distance']."&fields=id,name,picture.width(700).height(700)";
				}
				else{
					$url="/search?q=".$keyword."&type=".$type."&fields=id,name,picture.width(700).height(700)";
				}
			}
			if($type=="event"){
				$url="/search?q=".$keyword."&type=".$type."&fields=id,name,picture.width(700).height(700),place";
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
			$decoded = json_decode($result,true);
			if (empty($decoded)){
				echo "No Data Found";
			}
			else{ 
				if($type=="event"){
					?>
					<table class="description" style="border:1px solid black;background-color:#FAFAFA;width:700px;">
					<tr style="font-weight:bold;background-color:#F3F3F3"><td style='border:1px solid black;'>Profile Photo</td><td style='border:1px solid black;'>Name</td><td style='border:1px solid black;'>Details</td></tr>
					<?php
					foreach($decoded as $decodes){
						echo "<tr>";
						echo "<td style='border:1px solid black;'>";?>
						<a target="_blank" href="
						<?php
						echo $decodes['picture']['url'];
						?>">
						<img src="<?php
						echo $decodes['picture']['url'];
						?>
						" style="width=30px;height:40px"/></a>
						<?php
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						echo $decodes['name'];
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						if(array_key_exists('place',$decodes)){
							$placename=$decodes['place'];
							if(array_key_exists('name',$placename)){
								echo $decodes['place']['name'];
							}
						}
						else{
							echo "";
						}
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else if($type=="user" || $type=="page" || $type=="group"){
					//echo "hi";
					//echo $type;
					//print $result;
					$decoded = json_decode($result,true);
					echo '<table class="description" style="border:1px solid black;background-color:#FAFAFA;width:700px;">';
					?><tr style="font-weight:bold;background-color:#F3F3F3"><td style='border:1px solid black;'>Profile Photo</td><td style='border:1px solid black;'>Name</td><td style='border:1px solid black;'>Details</td></tr>
					<?php
					foreach($decoded as $decodes){
						echo "<tr>";
						echo "<td style='border:1px solid black;'>";?>
						<a target="_blank" href="
						<?php
						echo $decodes['picture']['url'];
						?>">
						<img src="<?php
						echo $decodes['picture']['url'];
						?>
						" style="width=30px;height:40px"/></a>
						<?php
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						echo $decodes['name'];
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						$idurl="index.php?id=".$decodes['id']."&keyword=".$keyword."&type=".$type;?>
						<a href="<?php echo $idurl;?>
						">
						<?php
						echo "Details</a>";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else if($type=="place"){
					//echo "holla";
					//echo $type;
					//print $result;
					$decoded = json_decode($result,true);
					echo '<table class="description" style="border:1px solid black;background-color:#FAFAFA;width:700px;">';
					?><tr style="font-weight:bold;background-color:#F3F3F3"><td style='border:1px solid black;'>Profile Photo</td><td style='border:1px solid black;'>Name</td><td style='border:1px solid black;'>Details</td></tr>
					<?php
					foreach($decoded as $decodes){
						echo "<tr>";
						echo "<td style='border:1px solid black;'>";?>
						<a target="_blank" href="
						<?php
						echo $decodes['picture']['url'];
						?>">
						<img src="<?php
						echo $decodes['picture']['url'];
						?>
						" style="width=30px;height:40px"/></a>
						<?php
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						echo $decodes['name'];
						echo "</td>";
						echo "<td style='border:1px solid black;'>";
						$idurl="index.php?id=".$decodes['id']."&keyword=".$keyword."&type=".$type."&address=".$iplocation."&distance=".$ipdistance;?>
						<a href="<?php echo $idurl;?>
						">
						<?php
						echo "Details</a>";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
			}
		}
		if(isset($_GET['id'])){
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
			$decoded = json_decode($result,true);
			$json = json_decode($result);
			if(array_key_exists('albums', $json)){
				?>
				<div style="width:700px;background-color:#CDCDCD;"><a id="album" href="#albums" onclick="myFunction()">Albums</a></div>
				<?php
				$albumjsonname = $json->{'albums'};
				//echo sizeof($albumjsonname);?>
				<div id="albums"><table style="width:700px;background-color:#FAFAFA;border-collapse:collapse;border-color:red">
				<?php
				foreach($albumjsonname as $printcheck){
					if(array_key_exists('photos',$printcheck)){
						$internalarray=$printcheck->{'photos'};?>
						<tr style='border:1px solid black;'><td><a href="#<?php echo $printcheck->{"id"} ?>" onclick="if(document.getElementById('<?php echo $printcheck->{'id'} ?>').style.display=='none'){
							document.getElementById('<?php echo $printcheck->{'id'} ?>').style.display='block';
						}else{document.getElementById('<?php echo $printcheck->{'id'} ?>').style.display='none';}"><?php echo $printcheck->{'name'}?></a></td></tr>
						<div><tr id="<?php echo $printcheck->{'id'}?>" style="display:none;border:1px solid black;"><td>
						<?php
						foreach($internalarray as $photoid){
							$pictureurl="https://graph.facebook.com/v2.8/".$photoid->{'id'}."/picture?access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
							
							?>
							<a target="_blank" href="<?php echo $pictureurl; ?>"> <img src="<?php	echo $photoid->{'picture'}; ?>
							" style="width=30px;height:40px"/></a>
							<?php
						}
						echo "</td></tr></div>";
					}
					else{
						echo "<tr><td style='border:1px solid black;'>".$printcheck->{'name'}."</td></tr>";
					}
				}
				echo "</table></div>";
			}
			else{?>
				<div style="width:700px;background-color:#FAFAFA;">No Albums has been found</div>
			<?php
			}
			echo "<br/>";
			?>
			<?php
			if(array_key_exists('posts',$json)){
				$postjsonname = $json->{'posts'};?>
				<div style="width:700px;background-color:#CDCDCD;"><a id="album" href="#posts" onclick="myFunction1()">Posts</a></div>
				<div id="posts"><table style="width:700px;background-color:#FAFAFA;border-collapse:collapse;border-color:#CDCDCD;"><tr><td style="background-color:#E5E5E5;border:1px solid black;"><b>Message</b></td></tr>
				<?php
				foreach($postjsonname as $postname){
					if(array_key_exists('message', $postname)){
						echo "<tr><td style='border:1px solid black;'>";
						echo $postname->{'message'};
						echo "</td></tr>";
					}
				}
				echo "</table></div>";
			}
			else{?>
				<div style="width:700px;background-color:#FAFAFA;">No Posts has been found</div>
			<?php
			}
		}
	?>
	</center>
    </body>
</html>
