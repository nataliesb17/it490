<?php
/*
	Login req:
	{
		type: "login"
		username:"user",
		password:"[hashed password]"
	}
	*/

	//receiver gets message, based on type knows that we have a login and password

	$req = json_decode($msg); 
	$username = $req['username'];
	$password = $req['password'];

	//connect to DB
	//check if user exists
	//extract password
	
	if (password_verify($password, $result['password'])) {
		return array("type"=>"login", "status"=>200, "error":"");
	}
	else{
		return array("type"=>"login", "status"=>403, "error":"Invalid password");
	}

	/*
	Login resp
	{
		type: "login"
		status: 200, //? if you want status for success/fail
		error: "" //populate if there was an issue
	}
	*/
?>