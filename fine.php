<?php



 if($there_admin == 1)  {
        if (!empty($ex[1]) and !empty($ex[2])) {
        $id = $ex[1];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            if($result->ok == 'true'){
            $ch_id = $result->result->id;
            }else{
            $ch_id = $id; }
            $disp = mysqli_query($db, "SELECT * FROM channel WHERE c_id = '".$ch_id."'");
            $read = mysqli_fetch_assoc($disp);
            $b = $read['balance'];
            $f = $b - $ex[2];
            $fine = mysqli_query($db, "UPDATE channel SET balance = '".$f."' WHERE c_id = '".$ch_id."'");
            if($fine){
                $bot->send_message($chatid, "✅ Channel fined sucessfully.", null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to fine channel", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}