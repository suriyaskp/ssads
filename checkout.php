 <?php


 $disp = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid2."'");
            $p = mysqli_fetch_assoc($disp);
            $ph = $p['status'];

if($ph == Requested) {
    $bot->answer_inline($callback,"⚠️ You alredey requested please try after request done or cancel",true,null,null);
}else{
    mysqli_query($db, "UPDATE payment SET status = 'Requested' WHERE u_id = '".$chatid2."'");
    
    $balance = mysqli_fetch_assoc(mysqli_query($db, "SELECT SUM(balance) AS v FROM channel WHERE u_id='$chatid2'"))['v'];
        
        $bot->edit_message($chatid2,$mid2, "🚀 Your request sent successfully and your balanced updated. You will be noticed once your request completed.", null, null, 'HTML');
        $keyboard = new InlineKeyboardMarkup(true, false);
        $options[0][0] = ['text' => '✅ Request Completed', 'callback_data' => "1complete|||$chatid2"];
        $options[1][0] = ['text' => '❌ Cancel Request', 'callback_data' => "1refund|||$chatid2"];
        $keyboard->add_option($options);
   $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid2."'");
        $disp1 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid2."'");
        if(mysqli_num_rows($disp) > 0){
        foreach($disp1 as $datass){
            foreach($disp as $datas){
           
              $item .= "&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Active\n\n"; 
              }}
            $item2 .= "🛄 Payment Mode: ".$datass['method']."\n&#128179 Payment detail: ".$datass['pay']."\n";
            
   $bot->send_message(PAYOUT_GROUP_ID, "🗂 Withdraw Request From \n\n".$item."💁‍♂ User: @$username2\n🆔 User ID: $chatid2\n💰Total balance: $balance\n".$item2."\nℹ️ Make sure this payment i.e After you have paid withdraw amount to user..\n*⃣ Click Request Complete. The user will be informed about it.", null, json_encode($keyboard), 'HTML');
   
   }}