<?php


   mysqli_query($db, "UPDATE users SET step='IDDelete' WHERE chat='$chatid'");
    $keyboard = new ReplyKeyboardMarkup(true, false);
 $options[0][0]="🚫 Cancel";        
 $keyboard->add_option($options);
   $bot->send_message($chatid, "Send the Post ID to Delete Broadcast (Post ID which used on Send Broadcast time)" , null, json_encode($keyboard), 'HTML');