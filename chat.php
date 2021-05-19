<?php


if($chatid == ADMIN_CHAT_ID){
        if($text){
        $bot->send_message($replyid, $text, null, null, 'HTML');
        }elseif($photo){
        $bot->send_Photo($replyid, $photo,$caption,null, null, null);
        }
        }else{
        $bot->forward_message(ADMIN_CHAT_ID, $chatid, $mid);           
        }
        