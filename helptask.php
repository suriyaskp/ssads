<?php



$bot->delete_message($chatid2,$mid2); 
$bot->send_message($chatid2,"<b>🕒Scheduled posting (posting/deleting at a given time)</b>\n\n<b>Post 1 at 3:00pm</b>\nthis command is telling the bot to send the post that have id of 1 to all the channels in the list at 3:00pm\n\n<b>Post 1 until 3:30pm</b>\nin this command we are telling the bot to send the post that have id of 1 to all channels now, and delete it at 3:30pm\n\n<b>Post 1 at 3:00pm until 3:30pm</b>\nhere we are telling the bot to send the post that have id of 1 to all channels at 3:00pm and delete it at 3:30pm\n\nnote: keywords that have been used here is (Post, at, until)",null,null,'HTML');