<?php


   $bot->delete_message($chatid2,$mid2);
        
        $keyboard1 = new ReplyKeyboardMarkup(true, false);
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
        $keyboard1->add_option($options);       
        
        $disp1 = mysqli_query($db, "SELECT * FROM count");
            $read1 = mysqli_fetch_assoc($disp1); 
            $disp = mysqli_query($db, "SELECT * FROM channel WHERE c_id = '".$read1['message']."'");
        $read = mysqli_fetch_assoc($disp);
                

       if (mysqli_num_rows($disp) > 0) {
       
                 
       $sql_check = "SELECT * FROM ban WHERE c_id = '".$read1['message']."'";
                    
                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    
                    if ($there == 0) {
                        $sql_insert = "INSERT INTO ban (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$read[u_id]."', '".$read[u_name]."', '".$read[c_id]."', '".$read[c_name]."', '".$read[c_subs]."', '".$read[balance]."')";

                        $insert = mysqli_query($db, $sql_insert);
                        if($insert){
                        
            $rem = mysqli_query($db, "DELETE FROM channel WHERE c_id = '".$read1['message']."'");
            
         
                $bot->send_message($chatid2, "Channel banned sucessfully β", null, json_encode($keyboard1), 'HTML');                   
                $bot->send_message($read[u_id], "Hey $read[u_name]\nYour channel $read[c_name] has banned by AD Admin", null, null, 'HTML');

            }}}else{
                            $bot->send_message($chatid2, "not banned", null, json_encode($keyboard1), 'HTML');
                            
            }