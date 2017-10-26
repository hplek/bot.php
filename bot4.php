<?php
    
    include "./functions.php";

    $conn = getConnection();

    $access_token = 'R6WDXEti6QF2fy/cCru6/ATFjgRij0EsoG7gqfIgSOP0dJa8zxwrHPrrpT6NrFyIwfdlluu6umj1iZZ1+OllRhrVoaOmDA8dJeZsATCI19pON5qmxVfGZU4uxlaYJymgqfAlsrADRmuyjZHUt2GvJwdB04t89/1O/w1cDnyilFU=';

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

                    $text = 'รับบัญชาเมี้ยว';
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
