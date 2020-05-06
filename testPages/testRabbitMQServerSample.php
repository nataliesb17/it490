<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//require_once('functions.php'); //helper functions
require_once('account.php'); //db credentials

function connect (){
    require_once('account.php'); //db credentials
    global $db;
    global $project;
    if (mysqli_connect_errno())
      {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
      }  
    //echo "<br>Successfully connected to MySQL.<br>";
    mysqli_select_db( $db, $project );
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
	    $pass = HASHBYTE ('SHA1', $pass);
	    //database connection
	    $db = connect();
	    //validate credentials
	    $sql = "select * from user_info where username='$user' and password='$pass'";
	    $result = mysqli_query($db, $sql) or die(mysqli_error());
	    $rows = mysqli_num_rows($result);
	    $msg = "";
	    if($rows > 0){
	        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	            unset($_SESSION['user']);
	            $_SESSION['user'] = $user;
	            $msg = "Successfully signed in as $user";
	        }
	        $success = true;
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
		$pass = HASHBYTE ('SHA1', $pass);
		//database connection
	    $db = connect();
	    //insert new user info into db
	    $sql = "select * from user_info where username='$user'";
	    $result = mysqli_query($db, $sql) or die(mysqli_error());
	    $rows = mysqli_num_rows($result);
	    if($rows > 0){
	        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	        	$success = false;
	        	$msg = "User already exists. Please select another username.";
	        	redirect("Loading...", "signup.php", 3);
	        }
	    }
	    else{
	    	$success = true;
	    	$msg = "Successfully signed up as $user. Please sign in.";
	        $sql = "insert into user_info (username, password, name, email) values ('$user', '$pass', '$name', '$email')";
	    	$result = mysqli_query($db, $sql) or die(mysqli_error());
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
        if(isset($_SESSION['user'])){
            return true;
        }
        if($redirect){
            redirect("Loading...", "signin.php", 3);
        }
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
        $result = mysqli_query($db, $sql) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
	      //do nothing
	      break;
		}
		return array("return_code" => '0',
			"message" => "Server received request and processed it");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "testserver");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
