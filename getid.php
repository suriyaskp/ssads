<?php



if($there_admin == 1) { 
if($text != "/cancel" || $text != "π« Cancel") {
 if(is_numeric($text)){
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
    $bot->send_message($chatid, "β¬ Here is your post with id $text Preview :" , null, json_encode($keyboard), 'HTML');
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
        $bot->send_message($chatid, "β οΈ Invalid Post ID please check the numbers again and make sure its not extremely OLD post" , null, null, 'HTML');           
    }
}}}