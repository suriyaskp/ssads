<?php


    mysqli_query($db, "UPDATE schedule SET status='done' WHERE id= '".$text."'");
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
$bot->send_message($chatid, "Task $text was removed 🗑️", null, json_encode($keyboard), 'HTML');