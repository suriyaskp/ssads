<?php



if($there_admin == 1){
 mysqli_query($db, "UPDATE users SET step='getPost' WHERE chat='$chatid'"); 
 $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="🚫 Cancel";       
         $keyboard->add_option($options);
          $bot->send_message($chatid, "*🖼 Send/Forward your post with any type with/without caption*\n\n<b>bold text</b>\n<i>italic text</i>\n<a href=''www.link.com''>inline text</a>\n\n ℹ you can use both together, Bot automatically parses both Remember Caption has a limit of 1024 Characters by telegram\n\nUse Add Inline Buttons ⌨ After creating a post to add BUTTONS to any ALREADY CREATED POST" , null, json_encode($keyboard), 'Markdown');                 
        }