 <?php



 if($there_admin == 1)    {

$forcereply = new Forcereply(true, true);
            $bot->send_message($chatid, "<b>Please send channels @username or Channel ID</b>",null, json_encode($forcereply), 'HTML');
}