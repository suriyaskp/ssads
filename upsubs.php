<?php

//set_time_limit(0);
$today = date('Y-m-d');
$disp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM count WHERE id='1'"));
$time = $disp['sub_updated_at'];
if($time != $today){
       $sub = new subscriber_update($token);
       $disp = mysqli_query($db, "SELECT * FROM channel");
            $t = mysqli_num_rows($disp);
        
       
            
            if(mysqli_num_rows($disp) > 0){
                $i = 1;
                mysqli_query($db, "UPDATE count SET sub_updated_at = '".$today."' WHERE id =1");
               if($i == 1){
                $bot->send_message($chatid, "Updating Subscribers....", null, null, 'HTML');
  
             //   $bot->send_message($chatid, "Updating $i of $t channels", null, null, 'HTML');
             }
                foreach ($disp as $count) {
                    
                    $channel_id = $count['c_id'];
                    $subscriber = $sub->get_chat_member_count($channel_id);
                    $subs_count = $subscriber->result;
            if($subscriber->ok == true) {       

                    mysqli_query($db, "UPDATE channel SET c_subs = '".$subs_count."' WHERE c_id = '".$channel_id."'");         
                     $bot->edit_message($chatid,$mid+1, "Updating $i of $t channels", null, null, 'HTML');
             
                    $i++;          
            }else{
            sleep(10);
            $bot->edit_message($chatid,$mid+1,"".$subscriber->description."" , null, null, 'HTML');
            }
             
                }
                $bot->edit_message($chatid,$mid+1,"👥 Subscriber count updated...", null, null, 'HTML');
                
                
            }else{
                
                $bot->send_message($chatid, "❌ Failed to update subscribers.", null, null, 'HTML');
            }}else{
    $boz=  $bot->edit_message($chatid,$mid+1, "❌ You can't Update more than once per day.", null, null, 'HTML');
    if($boz->ok == false){
    $bot->send_message($chatid, "❌ You can't Update more than once per day.", null, null, 'HTML');
    }
            }
            
            
            
            
            
            
            
      /*      elseif($text == '🔃 Update Subscribers'){
        $sub = new subscriber_update($token);
        
       
            $disp = mysqli_query($db, "SELECT * FROM channel");
            $t = mysqli_num_rows($disp);
            if(mysqli_num_rows($disp) > 0){
                $i = 1;
                $bot->send_message($chatid, "Updating $i of $t channels", null, null, 'HTML');
                foreach ($disp as $count) {
                    
                    $channel_id = $count['c_id'];
                    $subscriber = $sub->get_chat_member_count($channel_id);
                    $subs_count = $subscriber->result;
            if($subs_count) {       

                    mysqli_query($db, "UPDATE channel SET c_subs = '".$subs_count."' WHERE c_id = '".$channel_id."'");
            }
                    
                    $bot->edit_message($chatid,$mid+1, "Updating $i of $t channels", null, null, 'HTML');
                    $i++;
                }
                $bot->edit_message($chatid,$mid+1,"👥 Subscriber count updated...", null, null, 'HTML');
                $today = date('Y-m-d');
                mysqli_query($db, "UPDATE count SET sub_updated_at = '".$today."' WHERE id =1");
            }else{
                
                $bot->send_message($chatid, "❌ Failed to update subscribers.", null, null, 'HTML');
            }}
            
            
            */