<?php

$dbhost = '';
$dbuser = 'root';
$dbpass = 'rootpswd';

//connection str w/ database
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

//error handling
if(!$conn){
	die("ERROR: Could not connect: " . mysql_error());
}
echo "Connected to database";

//connect to database
$select = mysql_select_db("pokedex", $dbhandle);
or die("ERROR: Database not found");

//queries
$data = mysql_query("SELECT * FROM pokedex");
$json_response = array();

while($row = mysql_fetch_array($data, MYSQL_ASSOC)){
	//fetch data in array format
	$row_array['name'] = $row['name'];
	array_push($json_response, $row_array);
}

echo json_encode($json_response);

//$sql = 'SELECT * FROM pokedex WHERE name  ';

/*
$database_result = array();


for (i = 1; i < 6; i++){

	$slotname = "slot" + i.toString() //or whatever php uses
}
	
echo $reponse*/
?>