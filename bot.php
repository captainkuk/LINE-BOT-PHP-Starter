<?php
//$proxy = 'velodrome.usefixie.com:80';
//$proxyauth = 'http://fixie:576wxxmDxvm4BbS';
$access_token = 'h4PeUprC2ByFC3m79hAiCCRMxoTUR/vBZLeEK5PB5PnSoWOLv/Kwv4Lns+oy1WIgD8KBTPaLD/8XHJVQctTi945HDkaPcEJSGGjVeyaiFnE1d6qJyFMaIVC253R6hWc6BWFqfUmSqlCUINd9zR2v4gdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$text2='';
			
			// Build message to reply back
			if (substr($text,0,4)=='mysql'){
				$host = "us-cdbr-iron-east-05.cleardb.net";
				$username = "b0188175a00d8f";
				$password = "6c89afbb";
				$dbname = "heroku_285669661138a8d";
				
				if (!$con){
					die("Connection failed:" . mysqli_connect_error());
				}

				$sql = "select col1,col2,col3 from tbl1";
				$result = mysqli_query($con,$sql);

				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						$text2=$text2+$row['col1']."-".$row['col2']."-".$row['col3'];
					}
				}else{
					$text2=$text;
				}

				mysqli_close($con);

			}else{
				$text2=$text;
			}
			
			$messages = [
				'type' => 'text',
				'text' => $text2
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			//curl_setopt($ch, CURLOPT_PROXY, $proxy);
			//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
