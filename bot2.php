<?php
$access_token = 'HdFb3n2OGmwyqNijVDMdTj3S952Mo/MfWtdMC5qieGmgwweN6uBq+d6wTLV14P9A9MYU4dGgViJ00h72pBTWQFkffLasm3LStlW/bLnoiq6eeBmgq0shYh7zQuDd5WvpbAd/HYUluriGFOZXQ57+gwdB04t89/1O/w1cDnyilFU=';
$roomToken = 'U55f4811d1fec65aa0a696177be2acf93';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		$join = 0;
		if ($event['type'] == 'join'){
			$join = 1;
		}
		if ( ($event['type'] == 'message' && $event['message']['type'] == 'text' ) || $join == 1) {
			// Get text sent
			
			$question = [
				0 => [
					'keywords' => 'สี',
					'ans' => 'ช้อนชอบสีเหลือง เหมือนเชเช่'
				],
				1 => [
					'keywords' => 'สวย',
					'ans' => 'ถ้าสวยสุดในสายตาช้อนก็เช่เช่นี่แหละ'
				],
				2 => [
					'keywords' => 'แกล้งเช่',
					'ans' => 'ไหน ใครแกล้งเช่! เดี๋ยวโดน'
				],
				3 => [
					'keywords' => 'ผิดแล้วช้อน',
					'ans' => 'เค้าขอโทดดด'
				],
				4 => [
					'keywords' => 'ช่อน',
					'ans' => 'ช้อน!!! สะกดวรรณยุกต์ไม่เป็นหราา'
				],
				5 => [
					'keywords' => 'มีคนกบบด',
					'ans' => 'เอามันไปโบยยยยย'
				],
				6 => [
					'keywords' => 'คุณช้อน',
					'ans' => 'ใครเรียกเค้า ช้อนมาแล้ววววววว!'
				],
				7 => [
					'keywords' => 'ไม่ตอบ',
					'ans' => 'โดนปล่อยจาง'
				],
				8 => [
					'keywords' => 'กาก',
					'ans' => 'SO VERY กระจอก'
				],
				9 => [
					'keywords' => 'บอท',
					'ans' => 'บอทที่น่ารักที่สุด คือบอทช้อนคนนี้นี่เองงงง (^^)/'
				],
				10 => [
					'keywords' => 'กิน',
					'ans' => 'เช่กินมันหมดนั่นแหละ ยกเว้นผัก'
				],
				11 => [
					'keywords' => 'ฝันดี',
					'ans' => 'ขอให้ฝันถึงเช่นะ ^^'
				],
				12 => [
					'keywords' => 'น่ารัก',
					'ans' => 'น่ารักสุดๆ ในสายตาของช้อน คือเช่คนเดียว'
				],
				13 => [
					'keywords' => 'แกลบ',
					'ans' => 'กินมาม่าสิ'
				],
				14 => [
					'keywords' => 'กลับบ้าน',
					'ans' => 'GO HOME VERY GOOD'
				],
				15 => [
					'keywords' => 'โอชิแคน',
					'ans' => 'รักที่มีให้เธอ อธิบายไม่ถูกเลย รักที่ฉันมีให้แคน อยากให้แคนเป็นคนเก็บไว้ โอ้ แคน รอยยิ้มเธอ ทำฉันละเมอไปไกล'
				],
				16 => [
					'keywords' => 'ทำไม',
					'ans' => 'นี่ก็ขี้สงสัยจัง'
				],
				17 => [
					'keywords' => 'อิช้อน',
					'ans' => 'สุภาพหน่อยสิงับ คุณช้อนยังพูดสุภาพเลย'
				],
				18 => [
					'keywords' => 'นอน',
					'ans' => 'คนอ่อนแอเท่านั้นที่จะนอน8ชั่วโมง'
				],
				19 => [
					'keywords' => 'ทรยศ',
					'ans' => 'จับมันส่งตัวไปให้เช่ตีด้วยช้อน!'
				],
				20 => [
					'keywords' => 'เกลียดช้อน',
					'ans' => 'เกลียดเค้าเพราะเค้าน่ารักอะดิ'
				],
				21 => [
					'keywords' => 'คนดีดี',
					'ans' => 'ชิหลายใจ'
				],
				22 => [
					'keywords' => 'คามิโอชิ',
					'ans' => 'คามิโอชิของช้อนคือเซนต์ไง'
				],
				23 => [
					'keywords' => 'ลุงไอแมน',
					'ans' => 'อายุเท่ากันดั้ม'
				],
				24 => [
					'keywords' => 'CEO',
					'ans' => 'คุณหนูกรภัทร์ นิลประภา'
				],
				25 => [
					'keywords' => 'นกก',
					'ans' => 'ว้ายยยยยยยย นกกกกก'
				],
				26 => [
					'keywords' => 'โอชิใคร',
					'ans' => 'ช้อนโอชิเชเช่ไง'
				],
				27 => [
					'keywords' => 'มวยรอง',
					'ans' => 'นำทีมโดนแคนแคนคนคูล'
				],
				28 => [
					'keywords' => 'เพลงของเธอ',
					'ans' => 'ช้อนชอบมากกกกก ช้อนฟังวน ๆ ไปสิบรอบ'
				],
				29 => [
					'keywords' => 'หิว',
					'ans' => 'อยากกินเค้ก'
				],
				30 => [
					'keywords' => 'เซนต์?',
					'ans' => 'เซนต์แจนได้จากไปแล้ว เหลือแต่เชเช่'
				],
				31 => [
					'keywords' => 'แย่',
					'ans' => 'ไม่หวาย ๆ แย้แย่'
				],
				32 => [
					'keywords' => 'ช่ายยย',
					'ans' => 'ทำเสียงแบบมายด์'
				],
				33 => [
					'keywords' => 'ช่ายๆๆ',
					'ans' => 'ทำเสียงแบบเฌอปราง'
				],
				34 => [
					'keywords' => 'เจต',
					'ans' => 'คุณเจตสุภาถือกีต้าร์แล้วหล่อมาก<3'
				],
				35 => [
					'keywords' => 'น้องแมว',
					'ans' => 'เมี้ยวๆ หง่าว'
				],
				36 => [
					'keywords' => 'นายท่าน',
					'ans' => 'คิดถึงนายท่าน อยากโดนข่วน'
				],
				37 => [
					'keywords' => 'แส้',
					'ans' => 'เอาให้ควีนโบย'
				],
				38 => [
					'keywords' => 'อยากโดน',
					'ans' => 'พวกมาโซ'
					
				]
								
			];
			
			$found = 0;
			if($join == 0){
				foreach ( $question as $row ){
					if( strpos($event['message']['text'],$row['keywords']) !== false ){
						$text = $row['ans'];
						$found = 1;
						break;
					}
				}
			}else{
				$text = "สวัสดี คุณช้อนจะเป็นบอทที่น่ารัก รักกัน ๆ";	
			}
			
			if($found !== 0 || $join == 1){
				//$text = 'ช้อนไม่เข้าใจ ช้อน SO VERY กระจอก';
			
				//$text = $event['message']['text'];
					// Get replyToken
				$replyToken = $event['replyToken'];

				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
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
				$result = curl_exec($ch);
				curl_close($ch);
				echo $result . "\r\n";

			}
		}
	}
	
}

echo "OK";

?>
