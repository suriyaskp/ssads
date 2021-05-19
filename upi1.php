<?php


  if ($ex[0])
 {
    $disp = mysqli_query($db, "SELECT * FROM payment  WHERE u_id = '".$chatid."'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['pay'];
            
if($ch == "**") {
    $sql_insert = mysqli_query($db, "UPDATE payment SET pay = '".$ex[0]."' WHERE u_id = '".$chatid."'");
    $bot->delete_message($chatid,$mid-1);
    
        $forcereply = new Forcereply(true, true);
            $bot->send_message($chatid, "<b>Please send Your Channel @username or Channel ID (which looks like this -1234567890123)</b>",null, json_encode($forcereply), 'HTML');
            }else{
            $sql_insert = mysqli_query($db, "UPDATE payment SET pay = '".$ex[0]."' WHERE u_id = '".$chatid."'");
    $bot->delete_message($chatid,$mid-1);    
    if($there_admin == 1)    {
     
        
        $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="Login Admin Panel 🖥️";
        $options[1][0]="🏕 Contact for Ad or Queries";
        $options[2][0]="🖌️ Register New Channels";
        $options[3][0]="📚 My Channels";
        $options[4][0]="📡 Share this bot";
        $options[4][1]="ℹ️ Help";
        $keyboard->add_option($options);
        
        $bot->send_message($chatid, "<b>payment details updated successfully.</b>", null, json_encode($keyboard), 'HTML');
  }else{
           $keyboard = new ReplyKeyboardMarkup(true, false);
                $options[0][0]="🏕 Contact for Ad or Queries";
        $options[1][0]="🖌️ Register New Channels";
        $options[2][0]="📚 My Channels";
        $options[3][0]="📡 Share this bot";
        $options[3][1]="ℹ️ Help";
        $keyboard->add_option($options);
        
        $bot->send_message($chatid, "<b>payment details updated successfully.</b>", null, json_encode($keyboard), 'HTML');
       } 
            }}else{
            $bot->delete_message($chatid,$mid-1);
            $bot->send_message($chatid,"<b>⚠️ Invalid Phone Number/UPI/e-email address</b>",null, null, 'HTML');
            }