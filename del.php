<?php


 if($there_admin == 1)  {
        if(!empty($ex[1])){
        $user_id = $ex[1];
        $result = $bot->getChat(getId($user_id));
print_r($result);
            $type = $result->result->type;
                        if($result->ok == 'true'){
            $ch_id = $result->result->id;
            }else{
            $ch_id = $user_id; }
            $rem = mysqli_query($db, "DELETE FROM channel WHERE c_id = '".$ch_id."'");
            $rem1 = mysqli_query($db, "DELETE FROM channel WHERE c_name = '".$ch_id."'");
            if($rem){
                $bot->send_message($chatid, "✅ Channel removed sucessfully.", null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to remove channel", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}