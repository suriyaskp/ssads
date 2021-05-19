 <?php


 $user_id = $ex[1];
            $result = $bot->getChat(getId($user_id));
print_r($result);
            $type = $result->result->type;
                        $u_id = $result->result->id;
            $bot->send_message($chatid, $u_id, null, null, 'HTML');
          