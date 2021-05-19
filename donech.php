<?php



$bot->answer_inline($callback,"⚠️ Verifing",false,null,null);
    if($there_admin1 == 1)    {
      
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
       $disp = mysqli_query($db, "SELECT * FROM checkch WHERE u_id = '".$chatid2."'");
            foreach($disp as $read){
                  
                
        $bot->delete_message($chatid2,$mid2); 
      $id = $read['c_id'];   
      
      $chcheck = $bot->getAdmin($id,BOT_ID);      
print_r($chcheck);
  $msgpost = $chcheck->result->can_post_messages;
  $msgdele = $chcheck->result->can_delete_messages;
  
            if($msgpost == 'true' && $msgdele == 'true' ){
                                 
                         $sql_insert = "INSERT INTO channel (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$read[u_id]."', '".$read[u_name]."', '".$read[c_id]."', '".$read[c_name]."', '".$read[c_subs]."',  '".$read[balance]."')";
                         $insert = mysqli_query($db, $sql_insert);
                        if($insert){
                         $rem = mysqli_query($db, "DELETE FROM checkch WHERE c_id = '".$id."'");
                    $bot->send_message($chatid2, "Successfully updated your userlog & registered your new channel!
\nPlease  join @".CHANNEL_USERNAME." channel", null, json_encode($keyboard), 'HTML');    

$bot->send_message(ADMIN_CHAT_ID, " <b><u>Channel registered successfully</u></b> \n---------------------------------\n&#128100Admin: ".$read['u_name']."\n&#128226Channel name: ".$read['c_name']."\n🆔 Channel ID:<code> ".$read['c_id']."</code>\n", null, null, "HTML");
                }}else{
     
      $rem = mysqli_query($db, "DELETE FROM checkch WHERE c_id = '".$id."'");
  
         
                      $bot->send_message($chatid2, "Verification falied ⚠️\n\n".POST_BOT_USERNAME." Bot Wasnt added as ADMINISTRATOR (Admin) in your given channel with required PERMISSIONS", null, json_encode($keyboard), 'HTML');    
     
                }}