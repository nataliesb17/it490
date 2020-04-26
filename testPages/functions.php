<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('account.php'); //db credentials

//redirect to different webpage
/*function redirect($msg, $url, $delay){
        echo "<br>$msg<br>";
        header("refresh:$delay url = $url");
        exit();
}*/


//db authentication
function connect(){
        $db = msqli_connect($server, $user, $pass, $dbname);
        echo "$db" . "connect function";
        if(!db){
                die('Connection failed: ' . mysqli_connect_error());
        }
        return $db;
}

/*function login($user,$pass){
        //database connection
        $db = connect();
        echo "$db" . "login function";
        //validate credentials
        $sql = "select * from accounts where username='$user' and password='$pass'";
        echo "$sql" . "login function";

        $result = mysqli_query($db, $sql) or die(mysqli_error());

        echo "$result" . "login function";


        $rows = mysqli_num_rows($result);
        $login = false;
        $userID = "";
        $msg = "";
        if($rows > 0){
	 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $userID = $row["userId"];
                        $login = true;
                }
                //redirect('Loading user profile...', 'profile.html', 3);
        }
        else{
                $msg = "Please use valid credentials.";
        }
        //account details
        return array(
                'login' => $login,
                'userID' => $userID,
                'msg' => $msg
        );
}*/

function signin($user){
        unset($_SESSION['user']);
        $_SESSION['user'] = $user;
}

function signout(){
        session_unset();
        session_destroy();
        header("Location: signout.html");
}

function isSignedIn($redirect=false){
        if(isset($_SESSION['user'])){
                return true;
        }
        if($redirect){
                header("Location: signin.html");
        }
}

function getUser($redirect=false){
        if(isSignedIn($redirect)){
                return $_SESSION['user'];
        }
        return false;
}

?>
