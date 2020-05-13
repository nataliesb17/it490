<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('account.php'); //db credentials

function connect (){
	include('account.php'); //db credentials 
    global $db;
    global $servername;
    global $username; 
    global $password; 
    global $dbname; 
    $servername = "localhost";
    $username = "maniroopa";
    $password = "Pokemon_fantasy321";
    $dbname = "pokemon_fantasy";
    try{
    	$db = new PDO("mysql:host=$servername;dbname=$dbname;",$username, $password);
    	print "connection to databse successfull";
    	return $db;
    }
    catch(PDOException $e){
    	print 'Connection failed: ' . $e->getMessage();
    }
}
function signin($user, $pass){
    try {
    	$success = false;
	    $msg = "";
	    //database connection
	    $db = connect();
	    //validate credentials
	    $sql = "select * from user_info where username='$user' and password='$pass'";
	    $statement = $db->prepare($sql);
	    if(!$statement){
	    	$db->errorInfo();
	    }
	    else{
	    	$statement->execute();
	    }
	    $rows = $statement->rowCount();
	    $msg = "";
	    if($rows > 0){
	        while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
	            $_SESSION['user'] = $user;
	        }
	        $success = true;
	        $msg = "Successfully signed in as $user";
	       	print("Message: $msg");
	       	header('Location: index.php');
	    }
	    else{
	    	$success = false;
	        $msg = "Please use valid credentials.";
	        print("Message: $msg");
	    }
	    return array(
	    	'success' => $success,
	    	'msg' => $msg
	    );
    } 
    catch(Exception $e){
        return $e->getMessage();
    }
}

function signup($name, $email, $user, $pass){
	try{
		$success = false;
	    $msg = "";
		//database connection
	    $db = connect();
	    //insert new user info into db
	    $sql = "select * from user_info where username='$user'";
	    $statement = $db->prepare($sql);
	    if(!$statement){
	    	$db->errorInfo();
	    }
	    else{
	    	$statement->execute();
	    }
	    $rows = $statement->rowCount();
	    if($rows > 0){
	        while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
	        	$success = false;
	        	$msg = "User already exists. Please select another username.";
	        }
	    }
	    else{
	    	$success = true;
	    	$msg = "Successfully signed up as $user. Please sign in.";
	        $sql = "insert into user_info (username, password, name, email) values ('$user', '$pass', '$name', '$email')";
	    	$statement = $db->prepare($sql);
		    if(!$statement){
		    	$db->errorInfo();
		    }
		    else{
		    	$statement->execute();
		    }
	    }
	    return array(
	    	'success' => $success,
	    	'msg' => $msg
	    );
	}
	catch(Exception $e){
        return $e->getMessage();
    }
}
function signout(){
    try{
        session_unset();
        session_destroy();     
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
function getUserInfo($user){
    try{
    	$success = false;
    	$msg = "";
		//database connection
        $db = connect();
        //validate credentials
        $sql = "select * from user_info where username='$user'";
        $statement = $db->prepare($sql);
	    if(!$statement){
	    	$db->errorInfo();
	    }
	    else{
	    	$statement->execute();
	    }
	    $rows = $db->rowCount();
        if($rows > 0){
            while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
            	$userInfo = array('name' => $row['name'], 'email' => $row['email'], 'username' => $row['username'], 'password' => $row['password']);
            	$_SESSION['name'] = $userInfo['name'];
            	$_SESSION['email'] = $userInfo['email'];
            	$_SESSION['user'] = $userInfo['username'];
            	$_SESSION['password'] = $userInfo['password'];
            	$success = true;
            	$msg = $userInfo;
            }
        }
        else{
        	$success = false;
            $msg = 'Could not retrieve user information.';
        }
        return array(
	    	'success' => $success,
	    	'msg' => $msg
	    );
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
function editProfile($name, $email, $user, $pass){
	try{
		$success = false;
	    $msg = "";
		//database connection
	    $db = connect();
	    //insert new user info into db
	    $sql = "select * from user_info where username='$user'";
	    $statement = $db->prepare($sql);
	    if(!$statement){
	    	$db->errorInfo();
	    }
	    else{
	    	$statement->execute();
	    }
	    $rows = $statement->rowCount();
	    if($rows > 0){
	        while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
	        	$sql = "update user_info set username='$user', password='$pass', name='$name', email='$email' where username='$user'";
		        $statement = $db->prepare($sql);
			    if(!$statement){
			    	$db->errorInfo();
			    }
			    else{
			    	$_SESSION['username'] = $user;
				    $_SESSION['password'] = $pass;
				    $_SESSION['name'] = $name;
				    $_SESSION['email'] = $email;
			    	$statement->execute();
			    }
			    $success = true;
	        	$msg = "Successfully updated $user's profile information.";
	        }
	    }
	    else{
	    	$success = false;
	    	$msg = "User information not found.";
	    }
	    return array(
	    	'success' => $success,
	    	'msg' => $msg
	    );
	}
	catch(Exception $e){
        return $e->getMessage();
    }
}

function request_processor($request){
	
	$returnCode = 0;
	$response = [];
	$message = "";
	$payload = "empty";
	
	
	echo "Received Request".PHP_EOL;
	echo "<pre>" . var_dump($request) . "</pre>";
	if(!isset($request['type'])){
		return "Error: unsupported message type";
	}
	//Handle message type
	$type = $request['type'];
	switch($type){
		case "signin":
			$returnCode = 0;
            $message = "request recieved successfully";
            $payload = signin($request['username'], $request['password']);
            break;
		case 'signup':
			$returnCode = 0;
            $message = "request recieved successfully";
            $payload = signup($request['name'], $request['email'], $request['username'], $request['password']);
			break;
		case 'signout':
			return signout();
			break;
		case 'editProfile':
			$returnCode = 0;
            $message = "request recieved successfully";
            $payload = editProfile($request['name'], $request['email'], $request['username'], $request['password']);
			break;
		case 'getUserInfo': 
			$returnCode = 0;
            $message = "request recieved successfully";
            $payload = getUserInfo($request['username']);
			break;
	    case "redirect":
	      break;
	    case "validate_session":
				//return validate($req['session_id']);
		case "echo":
			return array("return_code"=>'0', "message"=>"Echo: " .$req["message"]);
	    default:
	      	$returnCode = 0;
            $message = "Default message.";
            $payload = "default payload";
	      break;
		}
		$response = array("return_code" => $returnCode,
			"message" => $message,
			"payload" => $payload
		);
    	return $response;
}

$server = new rabbitMQServer("testRabbitMQ.ini", "testserver");
echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
