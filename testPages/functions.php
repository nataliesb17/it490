<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('account.php'); //db credentials

class Client{
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
                require_once('path.inc');
                require_once('get_host_info.inc');
                require_once('rabbitMQLib.inc');
                try{
                        $client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
                        $msg = ("type"=>"signin", "username"=>$user, "password"=>$pass);
                        $response = $client->send_request($msg); 
                        //$payload = json_encode($response);      
                        return $response;
                }
                catch(Exception $e){
                        return $e->getMessage();
                }
        }

        function signup($name, $email, $user, $pass){
                require_once('path.inc');
                require_once('get_host_info.inc');
                require_once('rabbitMQLib.inc');
                require_once('account.php'); //db credentials
                try{
                        $client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
                        $msg = ("type"=>"signup", "name"=>$name, "email"=>$email, "username"=>$user, "password"=>$pass);
                        $response = $client->send_request($msg);       
                        return $response;
                }
                catch(Exception $e){
                        return $e->getMessage();
                }
        }
        function signout(){
                try{
                        session_unset();
                        session_destroy();
                        Client::redirect("Signing out...", "signout.php", 3);      
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
                                Client::redirect("Loading...", "signin.php", 3);
                        }
                }
                catch(Exception $e){
                        return $e->getMessage();
                }
        }
        function getUserInfo($user){
                require_once('path.inc');
                require_once('get_host_info.inc');
                require_once('rabbitMQLib.inc');
                require_once('account.php'); //db credentials
                try{
                        $client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
                        $msg = ("type"=>"getUserInfo", "username"=>$user);
                        $response = $client->send_request($msg); 
                        return $response;
                }
                catch(Exception $e){
                        return $e->getMessage();
                }
        }
}
?>
