<?php


 $keyboard = new ReplyKeyboardMarkup(true, false);
 $options[0][0]="📤 Send Broadcast"; 
 $options[0][1]="🗑 Delete Broadcast"; 
 $options[1][0]="📦 Create Post"; 
 $options[1][1]="🏝 Preview Post"; 
 $options[2][0]="⌨ Add Inline Buttons"; 
 $options[3][0]="📗 Channels List"; 
 $options[3][1]="⛔Banned channels"; 
 $options[4][0]="👤Admins list"; 
 $options[4][1]="📈 Promo"; 
 $options[5][0]="💳 Set Amount"; 
 $options[5][1]="💻 View Amount"; 
 $options[6][0]="⏰ Tasks"; 
 $options[6][1]="📟 Total Earnings"; 
 $options[7][0]="🧾 View Count"; 
 $options[7][1]="📚 Channels Earning"; 
 $options[8][0]="ℹ️ Get Channel Info"; 
 $options[8][1]="ℹ️ Get User Info"; 
 $options[9][0]="🔃 Update Subscribers"; 
 $options[9][1]="💾 Update Count"; 
 $options[10][0]="🤖 Bot Information"; 
 $options[10][1]="🗃️ Commands"; 
 $options[11][0]="🎲 Goto Start Menu"; 
 $keyboard->add_option($options);
     
     if($ex[0] == 'Post' && $ex[2] == 'at' && $ex[4] == 'until'){
         
       $insert = "INSERT INTO schedule (u_id, post, at, until, status) VALUES ('".$chatid."', '".$ex[1]."', '".$ex[3]."', '".$ex[5]."', '0/2')";
       $done = mysqli_query($db, $insert);
       
}
     
  elseif($ex[0] == 'Post' && $ex[2] == 'until'){
       $insert = "INSERT INTO schedule (u_id, post, at, until, status) VALUES ('".$chatid."', '".$ex[1]."', 'none', '".$ex[3]."', '0/1')";
       $done = mysqli_query($db, $insert);
     }
     
     elseif($ex[0] == 'Post' && $ex[2] =='at'){
       $insert = "INSERT INTO schedule (u_id, post, at, until, status) VALUES ('".$chatid."', '".$ex[1]."', '".$ex[3]."', 'none', '0/1')";
       $done = mysqli_query($db, $insert);
     }
     
     if($done){
     $id = mysqli_num_rows(mysqli_query($db, "SELECT id FROM schedule")); 
         $bot->send_message($chatid, "New Task was added.\n🆔Task ID: $id", null, json_encode($keyboard), 'HTML');
     }else{
         $bot->send_message($chatid, "📢please use correct format to add task.", null, json_encode($keyboard), 'HTML');
 }