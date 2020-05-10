<?php
require_once(__DIR__ . "/vendor/autoload.php");
use PokeAPI\Client;

$a = 1;
$client = new Client();

$pokeType = array('0', 'grass','grass','grass','fire','fire','fire');
$pokeColor = array('0', 'green', 'green', 'green','orange','orange','orange');

for ($a = 1; $a <= 6; $a++) {

$species = $client->species($a);
$number = $species->getId();
$name =  $species->getName();
$color =  $pokeColor[$a];
$type = $pokeType[$a];

//listen, i could only get the name and the pokedex number because this API SUCKS

echo $number . ", " . $name . ", " . $type . ", " . $color . " || ";
}

?>
