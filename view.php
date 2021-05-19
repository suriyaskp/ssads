<?php



if($there_admin == 1)  {
if(!empty($ex[1])){
        $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$ex[1]."'");
          $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$ex[1]."'");
          $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$ex[1]."'");
        if(mysqli_num_rows($disp2) > 0){
        foreach($disp2 as $datass){
        
            foreach($disp as $datas){

              $item .= "&#9775 ID: ".$datas['id']."\n👤 user: @".$datas['u_name']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Active\n\n"; 
              $tot = $tot + $datas['balance'];
            }
        if(mysqli_num_rows($disp1) > 0){
            foreach($disp1 as $datas){

              $item1 .= "&#9775 ID: ".$datas['id']."\n👤 user: @".$datas['u_name']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Banned\n\n"; 
            
            }}
            $item2 .= "🛄 Payment Mode: ".$datass['method']."\n&#128179 Payment detail: ".$datass['pay']."\n";
        
              $bot->send_message($chatid, "🗳 Registred channels\n\n".$item."".$item1."————————————————\n".$item2."🏧Total earnings : ₹".$tot, null, null, "HTML");
        
  
        }}}else{
            
            $bot->send_message($chatid, "<b>⚠️ Channel not found</b>", null, null, "HTML");
        }}