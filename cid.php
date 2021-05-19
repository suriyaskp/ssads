<?php


 if($there_admin == 1)    {
    $bot->delete_message($chatid,$mid-1); 
    $id = $ex[0];
            $result = $bot->getChat(getId($id));
print_r($result);
            $type = $result->result->type;
            if($result->ok == 'true'){
            $ch_id = $result->result->id;
            }else{
            $ch_id = $id; }
  

              $sql_check = "SELECT * FROM channel WHERE c_id = '$ch_id'"; 
                                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    
                    if ($there == 0){
                        
              $sql_check = "SELECT * FROM ban WHERE c_id = '$ch_id'";
                    
                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    }    
                    if ($there == 0){
     

    $keyboard = new InlineKeyboardMarkup(true, true);
               
         $options[0][0]=['text'=>'🗳️ Cancel','callback_data'=>'cancelch'] ;

         $keyboard->add_option($options);               
        $bot->send_message($chatid, "<b>Heres the Overall Channel Info </b>📑 \n\nChannel ID : $ch_id\nUserName : $ex[0]\n\n This Channel is not registered with our Bot Database 🗃", null, json_encode($keyboard), 'HTML');
        
            }else{     
                
     $insert = mysqli_query($db, "UPDATE count SET message = '".$ch_id."' WHERE id = '1'");
$insert = mysqli_query($db, $sql_insert);  

 $inline_keyboard = new InlineKeyboardMarkup(true, true);
        $options[0][0]= ['text'=>'♻️ Update balance','callback_data'=>'balupdate'];         
       $options[1][0]=['text'=>'🔨 Ban','callback_data'=>'banch'] ;
       $options[1][1]=['text'=>'📜 Unban','callback_data'=>'unbanch'] ;
        $options[2][0]=['text'=>'🗳️ Cancel','callback_data'=>'cancelch'] ;

         $inline_keyboard->add_option($options);

$disp = mysqli_query($db, "SELECT * FROM channel WHERE c_id = '".$ch_id."'"); 
$disp1 = mysqli_query($db, "SELECT * FROM ban WHERE c_id = '".$ch_id."'"); 

if (mysqli_num_rows($disp) > 0) { 
$read = mysqli_fetch_assoc($disp);
                $item = "<b>Heres the Overall Channel Info </b>📑 \n\nChannel ID : ".$read['c_id']."\nUserName : ".$read['c_name']."\n\nThe Channel is registered in our Bot Database 🗃 \n\n🆔️Registered by ID : ".$read['u_id']."\n🏷Registered by Username  : ".$read['u_name']."\n💰Balance  : ".$read['balance']."₹\n📈Total Subscribers  : ".$read['c_subs']."\n📟 Channel Status : Active";
}    
   elseif(mysqli_num_rows($disp1) > 0){   
$read = mysqli_fetch_assoc($disp1);  
                $item = "<b>Heres the Overall Channel Info </b>📑 \n\nChannel ID : ".$read['c_id']."\nUserName : ".$read['c_name']."\n\nThe Channel is registered in our Bot Database 🗃 \n\n🆔️Registered by ID : ".$read['u_id']."\n🏷Registered by Username  : ".$read['u_name']."\n💰Balance  : ".$read['balance']."₹\n📈Total Subscribers  : ".$read['c_subs']."\n📟 Channel Status : Banned"; 
   } 
                $bot->send_message($chatid, $item, null, json_encode($inline_keyboard), 'HTML');
                
            }}else{
       
          $bot->send_message($chatid, "not found", null, null, 'HTML');
            }