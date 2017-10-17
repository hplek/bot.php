<?php
    
    include "./functions.php";

    $conn = getConnection();

    $access_token = 'HdFb3n2OGmwyqNijVDMdTj3S952Mo/MfWtdMC5qieGmgwweN6uBq+d6wTLV14P9A9MYU4dGgViJ00h72pBTWQFkffLasm3LStlW/bLnoiq6eeBmgq0shYh7zQuDd5WvpbAd/HYUluriGFOZXQ57+gwdB04t89/1O/w1cDnyilFU=';

    $content = file_get_contents('php://input');
    $events = json_decode($content, true);

    if (!is_null($events['events'])) {

        foreach ($events['events'] as $event) {

            if($event['type'] == 'message' && $event['message']['type'] == 'text' ){

                if(strpos($event['message']['text'],"#?") !== false ){

                    $temp = $event['message']['text'];
                    $temp = explode('#?',$temp);

                    $key = $temp[0];
                    $ans = $temp[1];

                    addAnswer($key, $ans);

                    $text = 'ช้อนรู้แล้ว ช้อนไม่ได้แก่แบบเช่นะที่จะจำไม่ได้อะ';
                    $data = setData(1,$event['replyToken'],$text);
                    sendMessage($data,$access_token);

                }
                else if(strcmp($event['message']['text'],"member") == false)
                {

                    $data = setData(0,$event['replyToken']);
                    sendMessage($data,$access_token);
                }
                else
                {

                    if ($result = getReplyMessages()) {
                        
                            while ($obj = $result->fetch_object()) {
                                if( strpos($event['message']['text'],$obj->key) !== false ){
                                    $text = $obj->ans;
                                    break;
                                }
                            }
                            $result->close();
                    }

                    $data = setData(1,$event['replyToken'],$text);
                    sendMessage($data,$access_token);
                }
            }
        }
    }
        
    closeConnection($conn);

    echo "Bot OK";

?>
