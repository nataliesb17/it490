$url = 'https://web.njit.edu/~ol29/pokemon_sample.json'; //path to json file
$data = file_get_contents($url); //get file contents into a variable
$pokemon = json_decode($data); //parse the json

echo $pokemon //echo for unity