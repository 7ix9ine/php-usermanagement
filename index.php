<!DOCTYPE html>
<html>
<body>

<?php
session_start();

require_once __DIR__ . '/src/User.php';
require_once __DIR__ . '/src/functions.php';

$link = $_SERVER['REQUEST_URI'];
$db = databaseConnect();

?>

<form action="actions/login.php" method="post">
    <div style="text-align: right"><input type="submit" value="Login"/></div>
</form>


</body>
</html> 
