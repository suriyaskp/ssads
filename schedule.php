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
$first_name = $message->chat->first_name;
$mid = $message->message_id;
$text = @$message->text;
$reply = $message->reply_to_message->text;
$callback = $update->callback_query->id;
$data2 = $update->callback_query->data;
$chatid2 = $update->callback_query->message->chat->id;
$username2 = $update->callback_query->message->chat->username;
$mid2 = $update->callback_query->message->message_id;
$document = $message->document->file_id;
    $photo = $message->photo[1]->file_id; 
    $video = $message->video->file_id;
    $voice = $message->voice->file_id;
    $audio = $message->audio->file_id;
    $caption = $message->caption;
$ex = explode(" ", $text);

$time = date('g:ia');
echo $time;
$post = "SELECT * FROM schedule WHERE at = '".$time."'";
 $postch = mysqli_query($db, $post);
 $postat = mysqli_num_rows($postch);
 
$dpost = "SELECT * FROM schedule WHERE until = '".$time."'";
 $dpostch = mysqli_query($db, $dpost);
 $postuntil = mysqli_num_rows($dpostch);
 

 


if($postat >= 1){
$oo = $time;
require('commands/schedulepost.php');

}
     
if($postuntil >= 1){
$oo = $time;
require('commands/scheduledelete.php');

}

//$bot->send_message(1094274287,"hi5",null,null,null);


