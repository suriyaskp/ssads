<?php


 if($there_admin == 1)  {
        if (!empty($ex[1])) {
        $user_id = $ex[1];
        $result = $bot->getChat(getId($user_id));
print_r($result);
            $type = $result->result->type;
                        if($result->ok == 'true'){
            $ch_id = $result->result->id;
            }else{
            $ch_id = $user_id; }
            $clear = mysqli_query($db, "UPDATE channel SET balance = '0' WHERE c_id = '".$ch_id."'");
            if($clear){
                $bot->send_message($chatid, "✅ Payment cleared sucessfully for ".$ex[1], null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to clear payment", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }
}