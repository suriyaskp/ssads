<?php


 $keyboard = new ReplyKeyboardMarkup(true, false);
 $options[0][0]="๐ค Send Broadcast"; 
 $options[0][1]="๐ Delete Broadcast"; 
 $options[1][0]="๐ฆ Create Post"; 
 $options[1][1]="๐ Preview Post"; 
 $options[2][0]="โจ Add Inline Buttons"; 
 $options[3][0]="๐ Channels List"; 
 $options[3][1]="โBanned channels"; 
 $options[4][0]="๐คAdmins list"; 
 $options[4][1]="๐ Promo"; 
 $options[5][0]="๐ณ Set Amount"; 
 $options[5][1]="๐ป View Amount"; 
 $options[6][0]="โฐ Tasks"; 
 $options[6][1]="๐ Total Earnings"; 
 $options[7][0]="๐งพ View Count"; 
 $options[7][1]="๐ Channels Earning"; 
 $options[8][0]="โน๏ธ Get Channel Info"; 
 $options[8][1]="โน๏ธ Get User Info"; 
 $options[9][0]="๐ Update Subscribers"; 
 $options[9][1]="๐พ Update Count"; 
 $options[10][0]="๐ค Bot Information"; 
 $options[10][1]="๐๏ธ Commands"; 
 $options[11][0]="๐ฒ Goto Start Menu"; 
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
         $bot->send_message($chatid, "New Task was added.\n๐Task ID: $id", null, json_encode($keyboard), 'HTML');
     }else{
         $bot->send_message($chatid, "๐ขplease use correct format to add task.", null, json_encode($keyboard), 'HTML');
 }