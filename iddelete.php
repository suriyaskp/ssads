<?php


   mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid'");
    $query = mysqli_query($db, "SELECT * FROM messages WHERE id='$text'");
    $t = mysqli_num_rows($query);
    $errors = '';
    $i = 0;
    
$bot->send_message($chatid, "Deleted : $i of $t", null, null, 'HTML');
    while ($row = mysqli_fetch_assoc($query)) {
    $del = $row['message_id']+500;
       $bot->delete_message($row['channel'],$del);
       $botz = $bot->delete_message($row['channel'],$row['message_id']);
   if($botz) {mysqli_query($db, "DELETE FROM messages WHERE message_id = '".$row['message_id']."'");}
        if($botz->ok == false){$errors .= "Channel: {$row['channel']}:\n {$botz->description}\n\n";}else{$i++;}
        $bot->edit_message($chatid,$mid+1, "Deleted : $i of $t", null, null, 'HTML');
    }
    
    $bot->delete_message($chatid,$mid+1);
        $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="π€ Send Broadcast"; 
        $options[0][1]="π Delete Broadcast"; 
        $options[1][0]="π¦ Create Post"; 
        $options[1][1]="π Preview Post"; 
        $options[2][0]="β¨ Add Inline Buttons";
        $options[3][0]="π Channels List"; 
        $options[3][1]="βBanned channels"; 
        $options[4][0]="π€Admins list"; 
        $options[4][1]="π Promo"; 
        $options[5][0]="π³ Set Amount"; 
        $options[5][1]="π» View Amount"; 
        $options[6][0]="β° Tasks"; 
        $options[6][1]="π Total Earnings"; 
        $options[7][0]="π§Ύ View Count"; 
        $options[7][1]="π Channels Earning"; 
        $options[8][0]="βΉοΈ Get Channel Info"; 
        $options[8][1]="βΉοΈ Get User Info"; 
        $options[9][0]="π Update Subscribers"; 
        $options[9][1]="πΎ Update Count"; 
        $options[10][0]="π€ Bot Information"; 
        $options[10][1]="ποΈ Commands"; 
        $options[11][0]="π² Goto Start Menu";
        
        $keyboard->add_option($options);
        $bot->send_message($chatid, "Total Broadcasted π€ Channels : $t\n\nπ Successful : $i\n\n Unsuccessful π \nπ³ Error List : \n$errors", null, json_encode($keyboard), 'HTML');