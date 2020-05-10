<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//require_once('functions.php'); //helper functions
include('account.php'); //db credentials

function connect (){
    global $db;
    //$db = null;
    global $servername = "localhost";
    global $username = "maniroopa";
    global $password = "password";
    global $dbname "pokemon_fantasy";
    include('account.php'); //db credentials 
    print("db = $db // servername = $servername // username = $username // password = $password // dbname = $dbname");
    try{
    	$db = new PDO("mysql:host=$servername;dbname=$dbname;",$username, $password);
    	print("$db");
    	print "connection to databse successfull";
    	return $db;
    }
    catch(PDOException $e){
    	print 'Connection failed: ' . $e->getMessage();
    }
}

function redirect($message, $url, $delay){
    echo "<br> $message <br><br>";
    header ("refresh:$delay url = $url");
    exit(); 
}

function signin($user, $pass){
    try {
    	$success = false;
	    $msg = "";
	    $pass = hash('SHA1', $pass);
	    //database connection
	    $db = connect();
	    print("$db");
	    //validate credentials
	    $sql = "select * from user_info where username='$user' and password='$pass'";
	    $statement = $db->prepare($sql);
	    if(!$statement){
	    	$db->errorInfo();
	    }
	    else{
	    	$statement->execute();
	    }
	    $rows = $db->rowCount();
	    $msg = "";
	    if($rows > 0){
	        while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
	            unset($_SESSION['user']);
	            $_SESSION['user'] = $user;
	        }
	        $success = true;
	        $msg = "Successfully signed in as $user";
	        redirect("Signing in as $user...", "index.php", 3);
	    }
	    else{
	    	$success = false;
	        $msg = "Please use valid credentials.";
	        redirect("Loading...", "signin.php", 3);
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
		$pass = hash('SHA1', $pass);
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
	    $rows = $db->rowCount();
	    if($rows > 0){
	        while($row = $statement->fetchAll(PDO::FETCH_ASSOC)){
	        	$success = false;
	        	$msg = "User already exists. Please select another username.";
	        	redirect("Loading...", "signup.php", 3);
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
	    	redirect("Loading sign in page...", "signin.php", 3);
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
        redirect("Signing out...", "signout.php", 3);      
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
function isSignedIn($redirect=false){
    try{
    	$status = false;
        if(isset($_SESSION['user'])){
            $redirect = false;
            $status = true;
        }
        else{
        	$redirect = true;
        	$status = false;
        }
        if($redirect){
            redirect("Loading...", "signin.php", 3);
        }
        return $status;
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
            	$msg = print_r($userInfo);
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
		case 'isSignedIn':
			return isSignedIn();
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
