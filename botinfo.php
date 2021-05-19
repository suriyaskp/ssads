 <?php


 if($there_admin == 1)  {
      
    $totch = mysqli_query($db, 'SELECT COUNT(1) FROM channel');
            $countch = mysqli_fetch_array($totch); // total channels
      
    $totch1 = mysqli_query($db, 'SELECT COUNT(1) FROM users');
            $countch1 = mysqli_fetch_array($totch1); // total users
        $disp = mysqli_query($db, "SELECT * FROM count");
        $read = mysqli_fetch_assoc($disp);
       
       $inline = new InlineKeyboardMarkup(true, true);
        
        $options[0][0] = ["text" => "Open Registration", "callback_data" => "regopen"];
        $options[0][1] = ["text" => "Close Registration", "callback_data" => "regclose"];
        $options[1][0] = ["text" => "Open Payout", "callback_data" => "payopen"];
        $options[1][1] = ["text" => "Close Payout", "callback_data" => "payclose"];        
        $options[2][0] = ["text" => "💲 Payment settings", "callback_data" => "payup"];
        $options[3][0] = ["text" => "🚀 Add Credits", "url" => "https://t.me/ILEE_ADMIN"];
        $inline->add_option($options);
        $bot->send_message($chatid,"AD Manager Bot 🤖 version 0.9.2 \n\nBot Owner : @" .ADMIN_USERNAME." 👨‍💻\n\nRegistration limit: ".$read[minisub]."\nPayout limit: ".$read[minipay]."\n\nRegistration status: ".$read[onoff]."\nPayout status: ".$read[payout]."\n\nBot information 💶\n\n📈total channels: ".$countch[0]."\n👤total users: ".$countch1[0]."\n🔖 Use Rate: 3.5₹\n💰 Bot Credits: ".$read[credit]."₹\n\nℹ Click on Add Credits Only when youre ready to pay.", null, json_encode($inline), 'HTML');
  }