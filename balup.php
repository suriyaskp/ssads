<?php


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
    if ($ex[0]) {
    $disp = mysqli_query($db, "SELECT * FROM count WHERE id = '1'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['message'];
            
if($ch) {
    $sql_insert = mysqli_query($db, "UPDATE channel SET balance = '".$ex[0]."' WHERE c_id = '".$ch."'");
    $bot->delete_message($chatid,$mid-1);
         
    $bot->send_message($chatid, "<b>balance updated successfully.</b>", null, json_encode($keyboard), 'HTML');
            }}else{
            $bot->delete_message($chatid,$mid-1);
            $bot->send_message($chatid,"<b>⚠️ Invalid Phone Number/UPI/e-email address</b>",null, json_encode($keyboard), 'HTML');
            }