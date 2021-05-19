<?php


 if($there_admin == 1)  {
      if(!empty($ex[1])){
      
$id = $ex[1];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            $c_id = $result->result->id;
            if($type == channel){
                $subscriber = $bot->get_chat_member_count($c_id);
                $subs_count = $subscriber->result;
    
      $bot->send_message($chatid, "✅ $ex[1] have $subs_count subscribers",null, null, 'HTML');
      
            }else{
                $bot->send_message($chatid, "❌ Failed to  get subscribers", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Please use correct format", null, null, 'HTML');
        }} 