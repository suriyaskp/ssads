             <?php


            
 $insert = mysqli_query($db, "UPDATE payout SET gpay = 'open' WHERE id = '1'");
                    if($insert){
                    
                       $disp = mysqli_query($db, "SELECT * FROM payout");
        $read = mysqli_fetch_assoc($disp);  
           $inline = new InlineKeyboardMarkup(true, true);
        
         $options[0][0] = ["text" => "Open Paytm", "callback_data" => "paytmopen"];
        $options[0][1] = ["text" => "Close Paytm", "callback_data" => "paytmclose"];
        $options[1][0] = ["text" => "Open Paypal", "callback_data" => "paypalopen"];
        $options[1][1] = ["text" => "Close Paypal", "callback_data" => "paypalclose"];
        $options[2][0] = ["text" => "Open UPI", "callback_data" => "upiopen"];
        $options[2][1] = ["text" => "Close UPI", "callback_data" => "upiclose"];
        $options[3][0] = ["text" => "Open Gpay", "callback_data" => "gpayopen"];
        $options[3][1] = ["text" => "Close Gpay", "callback_data" => "gpayclose"];
        $options[4][0] = ["text" => "Open Phonepe", "callback_data" => "phonepeopen"];
        $options[4][1] = ["text" => "Close Phonepe", "callback_data" => "phonepeclose"];
        $inline->add_option($options);
        $bot->answer_inline($callback,"⚠️ Google Pay was opened.",true,null,null);
        $bot->send_message($chatid2,"<b>On or off Registration methods.</b>\n\n🔘 Current Status\nPaytm =>      <b>".$read[paytm]."</b>\nPaypal =>      <b>".$read[paypal]."</b>\nUPI =>            <b>".$read[upi]."</b>\nGpay =>         <b>".$read[gpay]."</b>\nPhonepe =>  <b>".$read[phonepe]."</b>\n", null, json_encode($inline), 'HTML');
        $bot->delete_message($chatid2,$mid2);
               }