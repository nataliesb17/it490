<?php
require("config.inc");
$source = "bitcoin";
if(isset($argv[1])){
	//$argv[0] is name of script always
	$source = $argv[1];
}
if(isset($_GET["query"])){
	$source = $_GET["query"];
}
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://pokestefan-skliarovv1.p.rapidapi.com/getPokemonByName",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	//CURLOPT_POSTFIELDS => "apiKey=$api_key&newsSource=$source",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		//"x-rapidapi-host: Pokestefan-skliarovV1.p.rapidapi.com",
		//"x-rapidapi-key: 8f4292231amsh7b46958f4b80aa1p17a8f7jsn626c3ad1f8ba"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
	$r = json_encode($response);

	if(isset($_GET["browser"])){

		echo "<pre>" . var_export($r,true)  . "</pre>";
	}
	else{
		echo $r;
	}
}
?>
