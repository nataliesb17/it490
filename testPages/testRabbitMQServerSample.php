<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('account.php'); //db credentials

//redirect to different webpage
function redirect($msg, $url, $delay){
	echo "<br>$msg<br>";
	header("refresh:$delay url = $url");
	exit();
}

//db authentication
function connect(){
	$db = msqli_connect($server, $user, $pass);
	if(!db){
		die('Connection failed: ' . mysqli_connect_error());
	}
	return $db;
}

function login($user,$pass){
	//database connection
	$db = connect();
	//validate credentials
	$sql = "select * from accounts where username='$user' and password='$pass'";
	$result = mysqli_query($db, $sql) or die(mysqli_error());
	$rows = mysqli_num_rows($result);
	$login = false;
	$userID = "";
	$msg = "";
	if($rows > 0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$userID = $row["userId"];
			$login = true;	
		}
		redirect('Loading user profile...', 'profile.html', 3);
	} 
	else{
		$msg = "Please use valid credentials.";
	}
	/*//account details
	return array(
		'login' => $login,
		'userID' => $userID,
		'msg' => $msg
	);*/
}

function request_processor($req){
	
	$returnCode = 0;
	$response = [];
	$message = "";
	$payload = "empty";
	
	
	echo "Received Request".PHP_EOL;
	echo "<pre>" . var_dump($req) . "</pre>";
	if(!isset($req['type'])){
		return "Error: unsupported message type";
	}
	//Handle message type
	$type = $req['type'];
	switch($type){
		case "login":
			$returnCode = 0;
			$message = "request recieved successfully";
			$payload = login($request['username'], $request['password']);
			return login($req['username'], $req['password']);
		case "validate_session":
			return validate($req['session_id']);
		case "echo":
			return array("return_code"=>'0', "message"=>"Echo: " .$req["message"]);
	}
	return array("return_code" => '0',
		"message" => "Server received request and processed it");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
