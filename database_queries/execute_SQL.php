$mysql_host = "localhost";
$mysql_database = "db";
$mysql_user = "user";
$mysql_password = "password";
# MySQL with PDO_MYSQL  
$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
$query = file_get_contents("shop.sql");
$stmt = $db->prepare($query);
if ($stmt->execute())
     echo "Success";
else 
     echo "Fail";
