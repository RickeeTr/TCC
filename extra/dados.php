<?php
header('Content-Type: application/json'); // Retorna JSON

$apiKey = 'AIzaSyDjA3Lm1d3BrDmSsOthT9hg8W5t-26lzY0';
$channelId = 'UCKy854A2wVaBkZO9kAt1w_g';

$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$channelId&key=$apiKey";
$response = file_get_contents($url);
$data = json_decode($response, true);

if (isset($data['items'][0]['statistics'])) {
    $inscritos = floor($data['items'][0]['statistics']['subscriberCount'] / 1000);
    $videos = floor($data['items'][0]['statistics']['videoCount'] / 1000);

    echo json_encode([
        'inscritos' => $inscritos,
        'videos' => $videos
    ]);
} else {
    echo json_encode([
        'inscritos' => 0,
        'videos' => 0
    ]);
}
?>
