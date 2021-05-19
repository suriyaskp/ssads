<?php



if($there_admin == 1) { 
if($text != "/cancel" || $text != "🚫 Cancel") {
 if(is_numeric($text)){
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
    $bot->send_message($chatid, "⬇ Here is your post with id $text Preview :" , null, json_encode($keyboard), 'HTML');
    mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid'");
    $datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='$text'"));
    
    if(isset($datas['id'])){
        $key = json_encode(['inline_keyboard' => json_decode($datas['keyboard'], true)]);
        if(!isset($datas['keyboard'])){
            $key = null;
        }
        if($datas['type'] == 'message'){
            $bot->send_message($chatid, "".$datas['caption']."" , null, $key, 'HTML');    
        }elseif($datas['type'] == 'photo'){
            $bot->send_Photo($chatid, "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'document'){
            $bot->send_Document($chatid, "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'video'){
            $bot->send_Video($chatid, "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'voice'){
            $bot->send_Voice($chatid, "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);          
        }elseif($datas['type'] == 'audio'){
            $bot->send_Audio($chatid, "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);             
        }
        
    }else{
        $bot->send_message($chatid, "⚠️ Invalid Post ID please check the numbers again and make sure its not extremely OLD post" , null, null, 'HTML');           
    }
}}}