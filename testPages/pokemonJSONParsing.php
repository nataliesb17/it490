<?php
	$url = 'http://ec2-3-135-254-200.us-east-2.compute.amazonaws.com/pokemon_sample_2.json'; //path to json file
	$file = file_get_contents($url);
	//$jsonData = var_dump(json_decode($file, true));
	//$json_string = json_encode($jsonData, JSON_PRETTY_PRINT);
	
	echo $file;
	
?>
