  <?php


  if($there_admin == 1)    {
        if(!empty($ex[1])){
        $id = $ex[1];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            $c_id = $result->result->id;
            $disp = mysqli_query($db, "SELECT * FROM ban WHERE c_id = '".$c_id."'");
            if (mysqli_num_rows($disp) > 0) {
                $read = mysqli_fetch_assoc($disp);
                }
               $sql_check = "SELECT * FROM channel WHERE c_id = '$c_id'";
                    
                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    
                    if ($there == 0) {
                        $sql_insert = "INSERT INTO channel (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$read[u_id]."', '".$read[u_name]."', '".$read[c_id]."', '".$read[c_name]."', '".$read[c_subs]."',  '".$read[balance]."')";

                        $insert = mysqli_query($db, $sql_insert);
                        if($insert){
                        
            $rem = mysqli_query($db, "DELETE FROM ban WHERE c_id = '".$c_id."'");
            if($rem){
                       
                $bot->send_message($chatid, "✔️ Channel unbanned sucessfully", null, null, 'HTML');
            }}else{
                $bot->send_message($chatid, "❌ failed to unban channel.", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Channel not found", null, null, 'HTML');
        }}else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}