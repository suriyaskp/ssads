 <?php


   $insertstep = mysqli_query($db, "UPDATE users SET step = 'none' WHERE chat = '".$chatid."'");
    $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid."'");
        $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$chatid."'");
        $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");
        if(mysqli_num_rows($disp2) > 0){
        
        if(mysqli_num_rows($disp) == 0 && mysqli_num_rows($disp1) == 0){
        $rem = mysqli_query($db, "DELETE FROM payment WHERE u_id = '".$chatid."'");
        }}
 if($there_admin == 1)    {
              $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="Login Admin Panel 🖥️";
        $options[1][0]="🏕 Contact for Ad or Queries";
        $options[2][0]="🖌️ Register New Channels";
        $options[3][0]="📚 My Channels";
        $options[4][0]="📡 Share this bot";
        $options[4][1]="ℹ️ Help";
        $keyboard->add_option($options);
        
        $bot->send_message($chatid, "<b>Hello again $username</b> 👋\nUse the bot to Contact for Advertising & Register your channel for ".AD_SERVICE_NAME." servises\nUse the <b>buttons</b> for further navigation 💬", null, json_encode($keyboard), 'HTML');
  } 
       else{
           $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="🏕 Contact for Ad or Queries";
        $options[1][0]="🖌️ Register New Channels";
        $options[2][0]="📚 My Channels";
        $options[3][0]="📡 Share this bot";
        $options[3][1]="ℹ️ Help";
        $keyboard->add_option($options);
        
        $bot->send_message($chatid, "<b>Hello again $username</b> 👋\nUse the bot to Contact for Advertising & Register your channel for ".AD_SERVICE_NAME." servises\nUse the <b>buttons</b> for further navigation 💬", null, json_encode($keyboard), 'HTML');
       }