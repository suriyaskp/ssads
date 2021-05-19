 <?php


  if($there_admin == 1)  {
        if($text != "/cancel" || $text != "🚫 Cancel")  {
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
        
        $keyboard->add_option($options);    
 $bot->send_message($chatid, "Successfully Added New post❗\nPost ID : $id" , null, json_encode($keyboard), 'HTML');    
 }}