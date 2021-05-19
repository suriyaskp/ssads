<?php

//set_time_limit(0);
$today = date('g');
$dispg = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM count WHERE id='1'"));
$time = $dispg['var_updated_at'];
if($time != $today){
mysqli_query($db, "UPDATE count SET var_updated_at = '".$today."' WHERE id ='1'");

       
       $disp = mysqli_query($db, "SELECT * FROM channel");
            $t = mysqli_num_rows($disp);
        
       
            
            if(mysqli_num_rows($disp) > 0){
                $i = 1;
                               if($i == 1){
                $bot->send_message($chatid, "Verifying channels....", null, null, 'HTML');
  
             //   $bot->send_message($chatid, "Updating $i of $t channels", null, null, 'HTML');
             }
                foreach ($disp as $count) {
                $id = $count['c_id'];
             $chcheck = $bot->getAdmin($id,BOT_ID);      
             print_r($chcheck);
             $msgpost = $chcheck->result->can_post_messages;
             $msgdele = $chcheck->result->can_delete_messages;
             $msgsta = $chcheck->status;
            if($chcheck->ok == 'false' || $msgpost == 'false' || $msgdele == 'false' || $msgsta == 'left' ) { 
            if($chcheck->ok == 'false'){
            $bot->edit_message($chatid,$mid+1,"".$chcheck->description."" , null, null, 'HTML');      
            }
            $bot->edit_message($chatid,$mid+1,$id , null, null, 'HTML');

                    $sql_insert = "INSERT INTO ban (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$count[u_id]."', '".$count[u_name]."', '".$count[c_id]."', '".$count[c_name]."', '".$count[c_subs]."',  '".$count[balance]."')";
                    $insert = mysqli_query($db, $sql_insert);
                    $item .= $count['c_id']." ".$count['c_name']."\n";
                        if($insert){
                         $rem = mysqli_query($db, "DELETE FROM channel WHERE c_id = '".$id."'");
                     
          }}
          $bot->edit_message($chatid,$mid+1, "Verifying $i of $t channels", null, null, 'HTML');
             
                    $i++;          
          }
             
                
                $bot->edit_message($chatid,$mid+1,"✅ Verification completed...\nban list↓\n".$item."", null, null, 'HTML');
                
                
            }else{
                
                $bot->send_message($chatid, "❌ Failed to update subscribers.", null, null, 'HTML');
            }}else{
    $boz=  $bot->edit_message($chatid,$mid+1, "You can verify once per hour.", null, null, 'HTML');
    if($boz->ok == false){
    $bot->send_message($chatid, "❌ You can verify only once per hour.", null, null, 'HTML');
    }
            }
            
            
            
            
            
         /*      $id = $read['c_id'];   
      
      $chcheck = $bot->getAdmin($id,BOT_ID);      
print_r($chcheck);
  $msgpost = $chcheck->result->can_post_messages;
  $msgdele = $chcheck->result->can_delete_messages;
  
            if($msgpost == 'true' && $msgdele == 'true' ){
                                 
                         $sql_insert = "INSERT INTO channel (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$read[u_id]."', '".$read[u_name]."', '".$read[c_id]."', '".$read[c_name]."', '".$read[c_subs]."',  '".$read[balance]."')";
                         $insert = mysqli_query($db, $sql_insert);
                        if($insert){
                         $rem = mysqli_query($db, "DELETE FROM checkch WHERE c_id = '".$id."'");
                    $bot->send_message($chatid2, "Successfully updated your userlog & registered your new channel!
\nPlease  join @".CHANNEL_USERNAME." channel", null, json_encode($keyboard), 'HTML');    
            
            
            */