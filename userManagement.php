<!DOCTYPE html>
<html>
<body>

<?php

require_once __DIR__ . '/functions.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

$query = $db->query("SELECT * FROM user");
$user = $query->fetchAll(\PDO::FETCH_ASSOC);

foreach ($user as $users){
    $username = $users['username'];
    echo"$username <br \>";
}

?>

</body>
</html>