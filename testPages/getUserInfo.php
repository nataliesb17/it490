<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//have client send message
$request = array("type" => "getUserInfo", "username" => $_SESSION["username"]);
$req = json_decode($request, true);
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$response = $client->send_request($request);
$response = json_encode($response);
print_r($response);
echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
?>
