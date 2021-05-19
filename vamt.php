<?php


 if($there_admin == 1)  {
        $disp = mysqli_query($db, "SELECT * FROM count");
        $read = mysqli_fetch_assoc($disp);
        
        $bot->send_message($chatid, "💰<b>AD Total Amount : </b>₹".$read['amt']."\n👥 <b>AD Total Subscribers : </b>".number_format($read['mem'])."\n⏰ <b>Amount set at : </b>".$read['updated_at']." IST", null, null, 'HTML');
  }