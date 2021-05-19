<?php


  $dis = mysqli_query($db, "SELECT * FROM count WHERE id = '1'");
 
            $t = mysqli_fetch_assoc($dis);
            $ch = $t['minisub'];
    if($there_admin == 1)    {
      
        $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="Login Admin Panel 🖥️";
        $options[1][0]="🏕 Contact for Ad or Queries";
        $options[2][0]="🖌️ Register New Channels";
        $options[3][0]="📚 My Channels";
        $options[4][0]="📡 Share this bot";
        $options[4][1]="ℹ️ Help";
        $keyboard->add_option($options);
             
  }else{
           $keyboard = new ReplyKeyboardMarkup(true, false);
                $options[0][0]="🏕 Contact for Ad or Queries";
        $options[1][0]="🖌️ Register New Channels";
        $options[2][0]="📚 My Channels";
        $options[3][0]="📡 Share this bot";
        $options[3][1]="ℹ️ Help";
        $keyboard->add_option($options);
            
       } 
    $disp1 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");
        if(mysqli_num_rows($disp1) > 0){
        
    $id = $ex[0];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            $c_id = $result->result->id;
            if($type == 'channel'){
                $subscriber = $bot->get_chat_member_count($id);
                $subs_count = $subscriber->result;
                if($subs_count >= $ch){

                    $sql_check = "SELECT * FROM channel WHERE c_id = '$c_id'";

                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    $payout = $payo;
                    if ($there == 0) {
                                          $sql_check1 = "SELECT * FROM ban WHERE c_id = '$c_id'";

                    $check1 = mysqli_query($db, $sql_check1);
                    $there1 = mysqli_num_rows($check1);
                 if ($there1 == 0) {
                        $sql_insert = "INSERT INTO checkch (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$chatid."', '@".$username."', '".$c_id."', '".$ex[0]."', '".$subs_count."', '0')";
                        
 $insert = mysqli_query($db, $sql_insert);
 
                        if($insert){
       $keyboard1 = new InlineKeyboardMarkup(true, false);
        $options1[0][0] = ['text' => '✅ Done', 'callback_data' => 'donech'];        
        $keyboard1->add_option($options1);
                            
                            $bot->send_message($chatid, "Now please add the Bot in your given channel as Admin WITH following Permissions (Its mandatory)\n\n>can_post_messages\n>can_delete_messages\n>can_edit_messages\n\nClick on Done ✅ Button below After adding the bot in your channel with required permissions", null, json_encode($keyboard1), "HTML");
                            
                        }else{
                            
                            $bot->send_message($chatid, "Failed to register channel", null, json_encode($keyboard), null);
                        }
                    }else{
                        $bot->send_message($chatid,"Channel already registered",null,json_encode($keyboard),null);
                    }}else{
                        $bot->send_message($chatid,"Channel already registered",null,json_encode($keyboard),null);

                    
                }}else{
                    
                    $bot->send_message($chatid, "☹️ Your channel ".getId($id)." have only $subs_count subscribers. Channel must have atleast $ch subscribers to register.", null, json_encode($keyboard), null);
                }
            }else{
                
                $bot->send_message($chatid, "The username ".getId($id)." you provided is not a channel", null, json_encode($keyboard), null);
            
        }}else{
            
            $bot->send_message($chatid, "Please use correct format to register channel", null, json_encode($keyboard), null);
        }