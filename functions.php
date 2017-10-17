<?php


    $dbtable = "`heroku_0f4f193fa6090dc`.`knowledge`";

    function getConnection()
    {

        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);
        
        if(!$conn = new mysqli($server, $username, $password, $db))
        {
            printf($conn->error);
        }

        $conn->set_charset("utf8");

        return $conn;

    }

    function closeConnection($conn)
    {
        $conn->close();
    }

    function addAnswer($key, $ans)
    {
        global $dbtable;

        $conn = getConnection();

        $sql = "INSERT INTO " . $dbtable . " (`key`,`ans`) VALUES ('$key','$ans')";

        $conn->query($sql);
        $conn->close();

    }

    function deleteAnswer($Id)
    {
        global $dbtable;

        $conn = getConnection();

        $sql = "DELETE FROM " . $dbtable . " WHERE Id = $Id";
        $conn->query($sql);
        $conn->close();

    }

    function getReplyMessages()
    {

        global $dbtable;

        $conn = getConnection();

        $sql_select = "select * from " . $dbtable;

        $result = $conn->query($sql_select);

        return $result;

    }

    function setData($isText, $reply, $text = "")
    {

        if($isText == 1){
            $messages = [
                'type' => 'text',
                'text' => $text
            ];
        }else{
            $imageUrl = 'https://secret-hamlet-58765.herokuapp.com/member.jpg';
            $imageMiniUrl = 'https://secret-hamlet-58765.herokuapp.com/membermini.jpg';
            $messages = [
                'type' => 'image',
                'originalContentUrl' => $imageUrl,
                'previewImageUrl' => $imageMiniUrl
            ];
        }
        $replyToken = $event['replyToken'];
        $data = [
            'replyToken' => $reply,
            'messages' => [$messages],
         ];

        return $data;
    }

    function sendMessage($data, $access_token){

        $url = 'https://api.line.me/v2/bot/message/reply';
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

?>
