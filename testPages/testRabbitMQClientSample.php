<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//have client send message t
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$email = $_POST['email'];
$password = $_POST['password'];
$req = array("type"=>"login", "email"=>$email, "password"=>$password);
$response = $client->send_request($req);
if ($response==1){
	echo 1;
}
else{
	echo "Login unsuccessful!";
}

/*
if(isset($argv[1])){
	$msg = $argv[1];
}
else{
	$msg = array("message"=>"test message", "type"=>"echo");
}

$response = $client->send_request($msg);

echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";

if(isset($argv[0]))
	echo $argv[0] . " END".PHP_EOL;
 */
