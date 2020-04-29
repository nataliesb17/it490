<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('functions.php'); //helper functions
require_once('account.php'); //db credentials

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
			$user = $req['username'];
			$pass = HASHBYTE ('SHA1', "$req['password']");
			//database connection
            $db = Client::connect();
            //validate credentials
            $sql = "select * from user_info where username='$user' and password='$pass'";
            $result = mysqli_query($db, $sql) or die(mysqli_error());
            $rows = mysqli_num_rows($result);
            $signin = false;
            $msg = "";
            if($rows > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $signin = true;
                    unset($_SESSION['user']);
                    $_SESSION['user'] = $user;
                    $msg = "Sign in successful."
                    echo $msg;
                }
                Client::redirect("Signing in as $user...", "index.php", 3);
            }
            else{
            	$signin = false;
                $msg = "Please use valid credentials.";
    			echo $msg;
                Client::redirect("Loading...", "signin.php", 3);
            }
            return $signin;
            break;
		case 'signup':
			$signup = false;
			$user = $req['username'];
			$pass = HASHBYTE ('SHA1', "$req['password']");
			$email = $req['email'];
			$name = $req['name'];
			//database connection
            $db = Client::connect();
            //insert new user info into db
            $sql = "select * from user_info where username='$user'";
            $result = mysqli_query($db, $sql) or die(mysqli_error());
            $rows = mysqli_num_rows($result);
            if($rows > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                	$signup = false;
                	echo "User already exists. Please select another username."
                	Client::redirect("Loading...", "signup.php", 3);
                }
            }
            else{
            	$signup = true;
                $sql = "insert into user_info values ('$user', '$pass', '$name', '$email')";
            	$result = mysqli_query($db, $sql) or die(mysqli_error());
            	Client::redirect("Loading sign in page...", "signin.php", 3);
            }
			return $signup;
			break;
		case 'signout':
			return Client::signout();
			break;
		case 'isSignedIn':
			return Client::isSignedIn();
			break;
		case 'getUserInfo': 
			$user = $req['username'];
			//database connection
            $db = Client::connect();
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
                }
            }
            else{
                echo 'Could not retrieve user information.';
            }
			return $userInfo;
			break;
	    case "redirect":
	      break;
	    case "validate_session":
				return validate($req['session_id']);
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
