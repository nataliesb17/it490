<?php
session_start();
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//have client send message
$request = array("type" => "editProfile", "name" => $_POST["name"], "email" => $_POST["email"],"username" => $_POST["username"],"password" => $_POST["password"]);
$_SESSION['username'] = $_POST["username"];
$_SESSION['name'] = $_POST["name"];
$_SESSION['email'] = $_POST["email"];
$req = json_decode($request, true);
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$response = $client->send_request($request);
$response = json_decode(json_encode($response), true);
print_r($response);
echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
?>
