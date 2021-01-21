<?php
$json_string = file_get_contents("php://input");
echo $json_string;
$json_array = json_decode($json_string, true);
$message = $json_array["event"]["text"];
$channel = $json_array["event"]["channel"];

if ($message == "ConnectionTest"){
    $url = "https://slack.com/api/chat.postMessage";
    $data = array(
        "token" => "xoxb-814570665175-1682567297296-GwJiE64kIc1fTi04fjmUYkdM",
        "channel" => $channel,
        "text" => "hello world!"
    );

    $context = array(
        "http" => array(
            "method" => "POST",
            "header" => implode("\r\n", array(
                "Content-Type: application/x-www-form-urlencoded"
            )),
            "content" => http_build_query($data)
        )
    );

    $html = file_get_contents($url, false, stream_context_create($context));
}