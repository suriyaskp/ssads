 <?php


     $bot->delete_message($chatid2,$mid2);
        
        $keyboard1 = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="📤 Send Broadcast"; 
        $options[0][1]="🗑 Delete Broadcast"; 
        $options[1][0]="📦 Create Post"; 
        $options[1][1]="🏝 Preview Post"; 
        $options[2][0]="⌨ Add Inline Buttons";
        $options[3][0]="📗 Channels List"; 
        $options[3][1]="⛔Banned channels"; 
        $options[4][0]="👤Admins list"; 
        $options[4][1]="📈 Promo"; 
        $options[5][0]="💳 Set Amount"; 
        $options[5][1]="💻 View Amount"; 
        $options[6][0]="⏰ Tasks";
        $options[6][1]="📟 Total Earnings"; 
        $options[7][0]="🧾 View Count"; 
        $options[7][1]="📚 Channels Earning"; 
        $options[8][0]="ℹ️ Get Channel Info"; 
        $options[8][1]="ℹ️ Get User Info"; 
        $options[9][0]="🔃 Update Subscribers"; 
        $options[9][1]="💾 Update Count"; 
        $options[10][0]="🤖 Bot Information"; 
        $options[10][1]="🗃️ Commands"; 
        $options[11][0]="🎲 Goto Start Menu";
        $keyboard1->add_option($options);       
        
        $disp1 = mysqli_query($db, "SELECT * FROM count");
            $read1 = mysqli_fetch_assoc($disp1); 
            $disp = mysqli_query($db, "SELECT * FROM ban WHERE c_id = '".$read1['message']."'");
        $read = mysqli_fetch_assoc($disp);
                

       if (mysqli_num_rows($disp) > 0) {
       
                 
       $sql_check = "SELECT * FROM channel WHERE c_id = '".$read1['message']."'";
                    
                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    
                    if ($there == 0) {
                        $sql_insert = "INSERT INTO channel (u_id, u_name, c_id, c_name, c_subs, balance) VALUES ('".$read[u_id]."', '".$read[u_name]."', '".$read[c_id]."', '".$read[c_name]."', '".$read[c_subs]."', '".$read[balance]."')";

                        $insert = mysqli_query($db, $sql_insert);
                        if($insert){
                        
            $rem = mysqli_query($db, "DELETE FROM ban WHERE c_id = '".$read1['message']."'");
            
         
                $bot->send_message($chatid2, "Channel unbanned sucessfully ✅", null, json_encode($keyboard1), 'HTML');                   
                $bot->send_message($read[u_id], "Hey $read[u_name]\nYour channel $read[c_name] is now Active ", null, null, 'HTML');

            }}}else{
                            $bot->send_message($chatid2, "not banned", null, json_encode($keyboard1), 'HTML');
                            
            }