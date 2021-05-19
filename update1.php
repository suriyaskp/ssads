<?php



if($there_admin == 1)  {
        if (!empty($ex[1]) and !empty($ex[2])) {
            $clear = mysqli_query($db, "UPDATE payment SET pay = '".$ex[2]."' WHERE id = '".$ex[1]."'");
            if($clear){
                $bot->send_message($chatid, "✅Payment detail updated for ".$ex[1], null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to clear payment", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}