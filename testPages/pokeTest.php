<?php
require_once(__DIR__ . "/vendor/autoload.php");
use PokeAPI\Client;

$a = 1;
$client = new Client();

for ($a = 1; $a <= 151; $a++) {

$species = $client->species($a);
$type = $client->type($a);
$name =  $species->getName();

echo $a . " " . $name . " ";
echo var_export($type,true);
}

?>
