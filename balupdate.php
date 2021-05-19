 <?php


  $bot->delete_message($chatid2,$mid2);
              $forcereply = new Forcereply(true, true);
       
       $bot->send_message($chatid2, "<b>Enter new balance for update</b>",null, json_encode($forcereply), 'HTML');
            