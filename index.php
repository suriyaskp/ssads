<?php

date_default_timezone_set("Asia/Kolkata");
require('bot.php');
require('sublib.php');
require('config.php');




$db = mysqli_connect('localhost', "$dbusr", "$dbpas", "$dbnam");


$bot = new telegram_bot($token);


$update = json_decode(file_get_contents('php://input'));
$data = $bot->read_post_message();
$message = $data->message;  
$date = $message->date;
$chatid = $message->chat->id;
$username = $message->chat->username;
$forwardid = $message->forward_from->id;
$forward = $message->forward_from->username;
$forwardch = $message->forward_from_chat->id;
$first_name = $message->chat->first_name;
$mid = $message->message_id;
$text = @$message->text;
$reply = $message->reply_to_message->text;
$replyid = $message->reply_to_message->forward_from->id;
$callback = $update->callback_query->id;
$data2 = $update->callback_query->data;
$chatid2 = $update->callback_query->message->chat->id;
$username2 = $update->callback_query->message->chat->username;
$mid2 = $update->callback_query->message->message_id;
$mid3 = $update->callback_query->message->inline_message_id;
$document = $message->document->file_id;
    $photo = $message->photo[1]->file_id; 
    $video = $message->video->file_id;
    $voice = $message->voice->file_id;
    $audio = $message->audio->file_id;
    $caption = $message->caption;
$ex = explode(" ", $text);



$date=date('d-m-Y');
$credit = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM count WHERE id='1'"));
$cdt = $credit['credit'];  
$cdtd = $credit['creditdate'];  

  $admin = "SELECT * FROM admins WHERE u_id = '$chatid'";
                    $check_admin = mysqli_query($db, $admin);
                    $there_admin = mysqli_num_rows($check_admin);
                    
  $admin1 = "SELECT * FROM admins WHERE u_id = '$chatid2'";
                    $check_admin1 = mysqli_query($db, $admin1);
                    $there_admin1 = mysqli_num_rows($check_admin1);
                    
  $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='$chatid2'"));
$step = $row['step'];
  $row1 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE chat='$chatid'"));
$step1 = $row1['step'];                                   
 if($date != $cdtd && $cdt >= '3.5'){
    $cdtup = number_format($cdt - 3.5, 2);
     mysqli_query($db, "UPDATE count SET credit = '".$cdtup."' WHERE id = '1'");
     mysqli_query($db, "UPDATE count SET creditdate = '".$date."' WHERE id = '1'");
     $cdtd = $date;
  }
    
  if($ex[0] == '/cdt' && $chatid == $botcreator){
  require('commands/topup.php');
  }
    
    if($date != $cdtd){
    echo "bot has been expired. recharge your bot to get it online.";
    if($there_admin == 1)    {
    $inline = new InlineKeyboardMarkup(true, true);
        $options[0][0] = ["text" => "💳 PAY NOW ", "url" => "https://t.me/ILEE_ADMIN"];
        $inline->add_option($options);
    $bot->send_message($chatid, "<b>⚠️ Bot has been stopped temporarily.</b>\nTo start your bot, pay the hosting price by clicking the below button.", null, json_encode($inline), 'HTML');
    }else{
        $bot->send_message($chatid, "<b>⚠️ Bot has been stopped temporarily.</b>", null, null, 'HTML');
   } }else{
echo "Bot online. Expires on $expire";
    function getId($id){
    $px = substr_count($id,"@");
    if($px == 1){
        return $id;
        }else{
            return $id;
        }
}

      $sql_chek = "SELECT * FROM users WHERE chat = '$chatid'";
        $chek = mysqli_query($db, $sql_chek);
        $thee = mysqli_num_rows($chek);
        
 
        
        if ($thee == 0) {
                        $sql_insert = "INSERT INTO users (chat,step) VALUES ('".$chatid."','none')";

                        $insert = mysqli_query($db, $sql_insert);
                        }
                        
  if ($cdt <= '3.5' && $there_admin == 1){
  $bot->send_message($chatid, "<b>⚠️Your bot expires tomorrow.</b>\nAdd credits to your bot to avoid bot stop.", null, null, 'HTML'); 
  }
  
  if ($data2 == 'donech'){
  require('commands/donech.php');
  }
     
  elseif($data2 == 'cancelch'){
  require('commands/cancelch.php');
  }
    
  elseif($data2 == 'cancel'){
  require('commands/cancel.php');
  }
     
  elseif ($data2 == 'balupdate'){
  require('commands/balupdate.php');
  }
         
  elseif($data2 == 'clearbal'){
  require('commands/clearbal.php');
  }
     
  elseif ($data2 == 'banch'){
  require('commands/banch.php');
  }
     
  elseif ($data2 == 'unbanch'){
  require('commands/unbanch.php');
  }
     
  elseif($data2 == 'payup'){
  require('commands/payup.php');
  }
     
  elseif($data2 == 'paychange'){
  require('commands/paychange.php');
  }
     
  elseif($data2 == 'Paytm'){
  require('commands/paytm.php');
  }

  elseif($data2 == 'UPI'){
  require('commands/upi.php');
  }

  elseif($data2 == 'paypal'){
  require('commands/paypal.php');
  }

  elseif($data2 == 'gpay'){
  require('commands/gpay.php');
  }

  elseif($data2 == 'phonepe'){
  require('commands/phonepe.php');
  }
 
  elseif($data2 == 'withdrew'){
  require('commands/withdrew.php');
  }     
 
  elseif($data2 == 'cheakout'){
  require('commands/checkout.php');
  }    
    
  elseif(preg_match('/^(1complete\|\|\|[0-9]{8,10})$/',$data2) ){
  require('commands/1complete.php');
  }

  elseif(preg_match('/^(1refund\|\|\|[0-9]{8,10})$/',$data2) ){
  require('commands/1refund.php');
  }

  elseif($data2 == 'addtask'){
  require('commands/addtask.php');
  }

  elseif($data2 == 'deletetask'){
  require('commands/deletetask.php');
  }

  elseif($data2 == 'helptask'){
  require('commands/helptask.php');
  }

  elseif($data2 == 'paytmopen'){
  require('commands/paytmopen.php');
  }

  elseif($data2 == 'paytmclose'){
  require('commands/paytmclose.php');
  }
               
  elseif($data2 == 'paypalopen'){
  require('commands/paypalopen.php');
  }

  elseif($data2 == 'paypalclose'){
  require('commands/paypalclose.php');
  } 
               
  elseif($data2 == 'upiopen'){
  require('commands/upiopen.php');
  }

  elseif($data2 == 'upiclose'){
  require('commands/upiclose.php');
  } 
               
  elseif($data2 == 'gpayopen'){
  require('commands/gpayopen.php');
  }

  elseif($data2 == 'gpayclose'){
  require('commands/gpayclose.php');
  }               
               
  elseif($data2 == 'phonepeopen'){
  require('commands/phonepeopen.php');
  }

  elseif($data2 == 'phonepeclose'){
  require('commands/phonepeclose.php');
  }               
 
  elseif($data2 == 'regopen'){
  require('commands/regopen.php');
  }
               
  elseif($data2 == 'regclose'){
  require('commands/regclose.php');
  }
               
  elseif($data2 == 'payopen'){
  require('commands/payopen.php');
  }
               
  elseif($data2 == 'payclose'){
  require('commands/payclose.php');
  }
      
  elseif($text == '/start'){
  require('commands/start.php');
  } 
       
  elseif($text== '/cancel'){
  require('commands/cancel1.php');
  }
       
  elseif($text == '🚫 Cancel'){
  require('commands/cancel2.php');
  }  
       
  elseif($text == '🏕 Contact for Ad or Queries'){
  require('commands/advert.php');
  }
        
  elseif($text == '🖌️ Register New Channels'){
  require('commands/register.php');
  }
        
  elseif($step1 == 'getPost' && $step1 != 'none'){
  require('commands/getpost.php');
  }             

  elseif( $step1 == 'GetId'){
  require('commands/getid.php');
  }
        
  elseif( $step1 == "number" && $reply == "Send your 10 digit paytm Number for Payout." || $reply == "Send your 10 digit Googlepay Number for Payout." || $reply == "Send your 10 digit Phonepay Number for Payout." ){
  require('commands/number.php');
  }
            
  elseif($ex[1] == "" && $reply == "Send your email address for Payout." ){
  require('commands/email.php');
  }
            
  elseif($ex[1] == "" && $reply == "Send your upi address for Payout." ){
  require('commands/upi1.php');
  }
           
  elseif($ex[1] == "" && $reply == "Enter new balance for update" ){
  require('commands/balup.php');
  }
             
  elseif( $text == '📡 Share this bot'){
  require('commands/share.php');
  }
        
  elseif($text == 'ℹ️ Help'){
  require('commands/help.php');
  }
        
  elseif($text == '📚 My Channels'){
  require('commands/mychannel.php');
  }
        
  elseif( $ex[1] == "" && $reply == "Please send Your Channel @username or Channel ID (which looks like this -1234567890123)" ){
  require('commands/channel.php');
  }
    
  elseif($text == 'Login Admin Panel 🖥️' && $there_admin == 1){
  require('commands/admin.php');
  }
    
        
  elseif($text == '🎲 Goto Start Menu'){
  require('commands/start1.php');
  }
        
  elseif($text == '📗 Channels List'){
  require('commands/list.php');
  }
               
  elseif($text == '👤Admins list'){
  require('commands/alist.php');
  }
        
  elseif($text == '⛔Banned channels'){
  require('commands/blist.php');
  }
        
  elseif($text == '💳 Set Amount'){
  require('commands/amt.php');
  }
        
  elseif ($ex[0] == '/setamt'){
  require('commands/amt1.php');
  } 
        
  elseif ($ex[0] == '/minipay'){
  require('commands/minipay.php');
  } 
        
  elseif ($ex[0] == '/minisub' && $there_admin == 1){
  require('commands/minisub.php');
  }
        
  elseif($text == '💻 View Amount'){
  require('commands/vamt.php');
  }
       
  elseif($text == '📼 Total Subscribers'){
  require('commands/subs.php');
  }    

  elseif( $ex[1]  == "" && $reply == "Please send user ID"){
  require('commands/uid.php');
  }
        
  elseif($ex[1]  == "" && $reply == "Please send channels @username or Channel ID"){
  require('commands/cid.php');
  }

  elseif($text == '📟 Total Earnings'){
  require('commands/totearn.php');
  }
       
  elseif($text == '⌨ Add Inline Buttons' && $there_admin == 1){
  require('commands/inline.php');
  } 

  elseif($step1 == 'kk' && $text){
  require('commands/kk.php');
  }
 
  elseif($step1 == 'getIDSend' && is_numeric($text)){
  require('commands/getidsend.php');
  }

  elseif($text == '⏰ Tasks' && $there_admin == 1){
  require('commands/tasks.php');
  }
        
  elseif($text == '🗑 Delete Broadcast' && $there_admin == 1){
  require('commands/dcast.php');
  }    
        
  elseif($text == '🧾 View Count'){
  require('commands/count.php');
  }

  elseif($text == '📚 Channels Earning'){
  require('commands/cearn.php');
  }
       
  elseif($text == '🔃 Update Subscribers'){
  require('commands/upsubs.php');
  }
        
  elseif(preg_match('/^([0-9]{1,4}\|\|(user|loud|silent)+)$/', $data2) && $step == 'getIDSend'){
  require('commands/send.php');
  }

  elseif($step1 == 'IDDelete' && is_numeric($text)){
  require('commands/iddelete.php');
  }

  elseif($text == '💾 Update Count'){
  require('commands/update.php');
  }
        
  elseif($text == '🤖 Bot Information'){
  require('commands/botinfo.php');
  }
        
  elseif($text ==  'ℹ️ Get Channel Info'){
  require('commands/cinfo.php');
  }

  elseif($text == 'ℹ️ Get User Info'){
  require('commands/uinfo.php');
  }

  elseif($text == '📈 Promo'){
  require('commands/promo.php');
  }
        
  elseif($text == '/arr'){
  require('commands/arr.php');
  }
        
  elseif($ex[0] == '/clearpayment'){
  require('commands/clearpayment.php');
  }
        
  elseif($ex[0] == '/update'){
  require('commands/update1.php');
  }
        
  elseif($ex[0] == '/rem'){
  require('commands/rem.php');
  }
 
  elseif($ex[0] == '/fine'){
  require('commands/fine.php');
  }
        
  elseif($ex[0] == '/rwd'){
  require('commands/rwd.php');
  }         
        
  elseif($ex[0] == '/switchadmin' && $there_admin == 1)    {
  require('commands/switch.php');
  }
      
  elseif($ex[0] == '/show' or $ex[0] == '/s'){
  require('commands/show.php');
  }
        
  elseif($ex[0] == '/del'){
  require('commands/del.php');
  }

  elseif($ex[0] == '/view'){
  require('commands/view.php');
  }
        
  elseif($ex[0] == '/getsub'){
  require('commands/getsub.php');
  }
        
  elseif($ex[0] =='/getid'){
  require('commands/getid1.php');
  }
        
  elseif($ex[0] == '/addadmin'){
  require('commands/addadmin.php');
  }

  elseif($ex[0] == '/removeadmin'){
  require('commands/removeadmin.php');
  }
        
  elseif($ex[0] == '/ban'){
  require('commands/ban.php');
  }
        
  elseif($ex[0] == '/unban'){
  require('commands/unban.php');
  }
        
  elseif($reply == "Enter the Task to Add ⏲" && $text && $there_admin == 1){
  require('commands/entertask.php');
  }

  elseif($reply == "Enter the Task ID to Delete 🗑️" && is_numeric($text) && $there_admin == 1){
  require('commands/deltask.php');
  }

  elseif($text == '📤 Send Broadcast'){
  require('commands/sendb.php');
  }

  elseif($text == '📦 Create Post'){
  require('commands/createp.php');
  }
     
  elseif($text == '🏝 Preview Post'){
  require('commands/previewp.php');
  }

  elseif($text == '🗃️ Commands' && $there_admin == 1){
  require('commands/command.php');
  }
  
  elseif($text== '/verify'){
  require('commands/verify.php');
  }
  
  elseif($message){
  require('commands/chat.php');        
  }
        
  if($update->inline_query){	
  require('commands/inlinepost.php');
  }
	
	
        
} 
    
mysqli_close($db);
