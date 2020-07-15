<!DOCTYPE html>
<html>
<body>

<?php
session_start();

require_once __DIR__ . '/src/User.php';
require_once __DIR__ . '/src/functions.php';

$db = databaseConnect();

var_dump($db);
$user = User::findById($db, 50);

$user1 = User::findByUsername($db, "jdoe");

var_dump($user1->getUsername());
var_dump($user->getFirstName());
?>

<form action="login.php" method="post">
    <div style="text-align: right"><input type="submit" value="Login"/></div>
</form>


</body>
</html> 
