<!DOCTYPE html>
<html>
<body>

<?php
session_start();

require_once __DIR__ . '/src/User.php';
require_once __DIR__ . '/src/functions.php';

databaseConnect();
?>

<form action="login.php" method="post">
    <div style="text-align: right"><input type="submit" value="Login"/></div>
</form>


</body>
</html> 
