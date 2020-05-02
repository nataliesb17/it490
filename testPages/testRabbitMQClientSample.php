<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('functions.php');

//have client send message
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');

if(isset($argv[1])){
	//$msg = $argv[1];
	$msg = array("userInfo"=>$argv[1], "type"=> "signin");
}
else{
	$msg = array("message"=>"test message", "type"=>"echo");
	//$msg = array("query"=>"corona", "type"=>"get_news");
}

$response = $client->send_request($msg);

echo "client received response: " . PHP_EOL;
print_r($response);
echo "\n\n";

if(isset($argv[0]))
echo $argv[0] . " END".PHP_EOL;
?>
