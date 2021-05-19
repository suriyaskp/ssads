   <?php


   $disp = mysqli_query($db, "SELECT * FROM payout WHERE id = '1'");
            $t = mysqli_fetch_assoc($disp);
            $ch = $t['gpay'];
            
if($ch == close) {
      $bot->answer_inline($callback,"⚠️ Google pay payments are currently disabled.please choose another option.",true,null,null);
}else{
 $insertstep = mysqli_query($db, "UPDATE users SET step = 'number' WHERE chat = '".$chatid2."'");
        $sql_check = "SELECT * FROM payment WHERE u_id = '".$chatid2."'";

                    $check = mysqli_query($db, $sql_check);
                    $there = mysqli_num_rows($check);
                    if ($there == 0) {
                    $sql_insert = "INSERT INTO payment (u_id, method, pay, tot) VALUES ('".$chatid2."', 'Google pay', '**','0')";
                    $insert = mysqli_query($db, $sql_insert);
                    }else{
                    $insert = mysqli_query($db, "UPDATE payment SET method = 'Google pay' WHERE u_id = '".$chatid2."'");
                    }
        $bot->delete_message($chatid2,$mid2);
        $forcereply = new Forcereply(true, true);
            $bot->send_message($chatid2, "<b>Send your 10 digit Googlepay Number for Payout.</b>",null, json_encode($forcereply), 'HTML');
}