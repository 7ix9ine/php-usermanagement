<!DOCTYPE html>
<html>
<body>

<?php
session_start();

require_once __DIR__ . '/src/User.php';
require_once __DIR__ . '/src/functions.php';

$db = databaseConnect();


$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$path = parse_url($url, PHP_URL_PATH);
$query = parse_url($url, PHP_URL_QUERY);
var_dump($path . $query);


?>

<form action="login.php" method="post">
    <div style="text-align: right"><input type="submit" value="Login"/></div>
</form>


</body>
</html> 
