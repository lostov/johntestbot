<?php
$access_token = '266674980:AAGvWyCSB676m_Xl9mczw27peNyY7dB6UPU';
$api = 'https://api.telegram.org/bot' . $access_token; 
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
$last_name = $output['message']['chat']['last_name'];
$message = $output['message']['text'];
switch($message) {
  case '/mail':
	$btn = new InlineKeyboardButton([
        'text' => 'Web-Site',
        'url' => 'http://lostov.net16.net'
    ]);
    $info_text = 'Хей ' . ' ' . $first_name . ' ' . $last_name . ', Привет если есть вопросы то вам сюда:
	' . $btn;
    sendMessage($chat_id, $info_text);
	break;
  case '/dev':
    // Salomlashish.
    $dev_text = 'DevBot:
	PHP: 5.7
	Ver: 1.0.0';
    sendMessage($chat_id, $dev_text);
	break;
   default:
    break;
}
function sendMessage($chat_id, $message) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));
}
?>
