<?php



$bot->delete_message($chatid2,$mid2); 
    $forcereply = new Forcereply(true, true); 
$bot->send_message($chatid2, "Enter the Task ID to Delete 🗑️",null, json_encode($forcereply), 'HTML'); 