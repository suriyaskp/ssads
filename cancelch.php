 <?php


 $insertstep = mysqli_query($db, "UPDATE users SET step = 'none' WHERE chat = '".$chatid."'");
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
        
        $bot->send_message($chatid2, "<b>Hello Admin  π₯οΈ\n how can i help you?</b>", null, json_encode($keyboard), 'HTML');
     $bot->delete_message($chatid2,$mid2);
     
     
     
     