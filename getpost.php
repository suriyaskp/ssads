 <?php


  if($there_admin == 1)  {
        if($text != "/cancel" || $text != "π« Cancel")  {
        if(!isset($caption)){$caption = null;} 
    if(isset($document)){mysqli_query($db, "INSERT INTO posts(file_id,caption,type,keyboard) VALUES ('$document','$caption','document','[]')");} 
    if(isset($photo)){mysqli_query($db, "INSERT INTO posts(file_id,caption,type,keyboard) VALUES ('$photo','$caption','photo','[]')");} 
    if(isset($video)){mysqli_query($db, "INSERT INTO posts(file_id,caption,type,keyboard) VALUES ('$video','$caption','video','[]')");} 
    if(isset($audio)){mysqli_query($db, "INSERT INTO posts(file_id,caption,type,keyboard) VALUES ('$audio','$caption','audio','[]')");} 
    if(isset($voice)){mysqli_query($db, "INSERT INTO posts(file_id,caption,type,keyboard) VALUES ('$voice','$caption','voice','[]')");}     
 if(isset($text)){mysqli_query($db, "INSERT INTO posts(caption,type,keyboard) VALUES ('".$text."','message','[]')");} 
     $id = mysqli_num_rows(mysqli_query($db, "SELECT id FROM posts")); 
     mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid'"); 
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
 $bot->send_message($chatid, "Successfully Added New postβ\nPost ID : $id" , null, json_encode($keyboard), 'HTML');    
 }}