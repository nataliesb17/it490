<?php
$stmt = "select * from Pokemon where IDno = '$id'";
$response = "";

$table = mysqli_query($db, $stmt) or die(...);
while ($row = mysqli_fetch_array($table, MYSQLI_ASSOC))
    {
        $name = $row['name']; 
                $stat1 = $row['stat1'];
                etc...
                $reponse = "'$name','$stat1',....'$statX'"
    }
echo $reponse
?>