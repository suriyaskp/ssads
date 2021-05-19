<?php


  if($there_admin == 1)  {
        $start = mysqli_query($db, "SELECT c_id, balance, c_subs, amt, mem FROM channel, count");
        if(mysqli_num_rows($start) > 0){
            foreach ($start as $count) {
                $ch = $count['c_id'];
                $c = ($count['amt'] / $count['mem']) * $count['c_subs'] * 0.8;
                $totbal = number_format($count['balance'] + $c, 2);
                mysqli_query($db, "UPDATE channel SET balance = '".$totbal."' WHERE c_id = '".$ch."'");
            }
            $bot->send_message($chatid, "✅ Channel earnings updated to database.", null, null, 'HTML');
        }else{
            $bot->send_message($chatid, "❌ Failed", null, null, 'HTML');
        }}