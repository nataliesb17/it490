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
$request = array("type" => "signin","username" => $_POST["username"],"password" => $_POST["password"]);
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$response = $client->send_request($request);
$response = json_decode($response);
echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";
print_r('Username from payload: ' . $response['payload']['username']);
echo "\n\n";
$_SESSION['username'] = $response['payload']['username'];
$_SESSION['name'] = $response['payload']['name'];
$_SESSION['email'] = $response['payload']['email'];
print_r('Session variables: ' . $_SESSION);
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
?>