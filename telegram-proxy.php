<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$BOT_CONFIG = [
    'token' => '8424607717:AAFeEtntxljg5H9WT7dRBIMQpMP21uJdaHY',
    'chat_id' => '1660672569'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $message = $input['message'] ?? '';
    
    $url = "https://api.telegram.org/bot{$BOT_CONFIG['token']}/sendMessage";
    $postData = [
        'chat_id' => $BOT_CONFIG['chat_id'],
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    echo $result;
}
?>
