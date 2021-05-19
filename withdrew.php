<?php



$disp = mysqli_query($db, "SELECT * FROM count WHERE id = '1'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['payout'];
            $mini = $t['minipay'];

if($ch == close) {
      $bot->answer_inline($callback,"⚠️ Payout withdrawal has been disabled by AD Admin please contact them in menu",true,null,null);
}else{
$disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid2."'");
            $t2 = mysqli_fetch_assoc($disp2);
            $ch2 = $t2['tot'];
            $ph = $t2['status'];

if($ph == Requested) {
    $bot->answer_inline($callback,"⚠️ You alredey requested please try after request done or cancel",true,null,null);
}else{
            if($ch2 < $mini) {
      $bot->answer_inline($callback,"⚠️ you need minimum ₹".$mini." to withdrew your earnings.",true,null,null);
}else{
 $bot->delete_message($chatid2,$mid2);
 $keyboard = new InlineKeyboardMarkup(true, false);
        $options[0][0] = ['text' => '📜 Cheakout', 'callback_data' => 'cheakout'];
        $options[1][0] = ['text' => '🚫 Cancel', 'callback_data' => 'cancel'];
        $keyboard->add_option($options);
        $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid2."'");
        $disp1 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid2."'");
        if(mysqli_num_rows($disp) > 0){
        foreach($disp1 as $datass){
            foreach($disp as $datas){
           
              $item .= "&#9775 ID: ".$datas['id']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Active\n\n"; 
              
              $tot = $tot + $datas['balance'];
            }}
            $item2 .= "🛄 Payment Mode: ".$datass['method']."\n&#128179 Payment detail: ".$datass['pay']."\n";
            
            $bot->send_message($chatid2, "🗳 Registred channels\n\n".$item."".$item2."🏧Total earnings : ₹".$tot, null, json_encode($keyboard), "HTML");
 }}}}