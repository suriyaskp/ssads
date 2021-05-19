   <?php


  if($there_admin == 1)    {
        $sql = "SELECT c_name, c_id, balance, c_subs, amt, mem FROM channel, count";
        $ccount = mysqli_query($db, $sql);
        $i = 1;
        foreach ($ccount as $count) {
            $c = ($count['amt'] / $count['mem']) * $count['c_subs'] * 0.8;
            $curent = number_format($c, 2);
            $totbal = number_format($count['balance'] + $c, 2);
            $item .= 🆔 ."".$count['c_id']."\n🏷️ ".$count['c_name']."\n💰 ₹".$count['balance']." + ₹".$curent." = ₹".$totbal."\n➖➖➖➖➖➖➖\n";
        }
        file_put_contents("countedupdates.txt", "All channels with Counted Earnings  📈\nTotal Amount: ".$count['amt']."\nTotal Subscribers: ".$count['mem']." \n\n$item");
        $bot->send_message($chatid, "<b>All channels with Counted Earnings  📈</b>\nTotal Amount: ".$count['amt']."\nTotal Subscribers: ".$count['mem']."\n\n".$item, null, null, 'HTML');
        $bot->send_document($chatid, "countedupdates.txt","",null, null, null);
        }