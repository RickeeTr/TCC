<?php
header('Content-Type: application/json');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 23 Jul 2000 05:00:00 GMT");

// CONASEMS
$apiKey = 'AIzaSyDjA3Lm1d3BrDmSsOthT9hg8W5t-26lzY0';
$channelId = 'UCKy854A2wVaBkZO9kAt1w_g';

$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$channelId&key=$apiKey";
$response = file_get_contents($url);
$data = json_decode($response, true);

$resultado = [
    'inscritos' => 0,
    'videos' => 0
];

if (isset($data['items'][0]['statistics'])) {
    $resultado['inscritos'] = floor($data['items'][0]['statistics']['subscriberCount'] / 1000);
    $resultado['videos'] = floor($data['items'][0]['statistics']['videoCount'] / 1000);
}

echo json_encode($resultado);
?>
