 <?php


 $keyboard = new InlineKeyboardMarkup(true, false);
    $options[0][0] = ['text' => '🔊 Notify Broadcast', 'callback_data' => "$text||loud"];
    $options[1][0] = ['text' => '🔇 Silent Broadcast', 'callback_data' => "$text||silent"];
    $options[2][0] = ['text' => '👔 User Broadcast', 'callback_data' => "$text||user"];
    $options[3][0] = ['text' => '🗳 Cancel', 'callback_data' => "cancelch"];
    $keyboard->add_option($options);
    $bot->send_message($chatid, "Normal broadcast $text 💬\nDo you want it to be a Loud one or silent ?", null, json_encode($keyboard), 'HTML');