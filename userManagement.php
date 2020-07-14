<!DOCTYPE html>
<html>

<head>

    <h3> User Management </h3>

</head>

<body>

<?php

require_once __DIR__ . '/functions.php';

$db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

$query = $db->query("SELECT * FROM user");
$user = $query->fetchAll(\PDO::FETCH_ASSOC);

?>

<div>

    <?php
    foreach ($user as $users): ?>
        <li>
            <a href="deleteUser.php?id=<?php echo $users['id']; ?>">Delete this user</a><?php
            echo "  id: " . $users['id'], " ", $users['First_name'], " ", $users['Last_name'], " ", $users['username'], " ", $users['eMail_adress'] ?>
        </li>
    <?php
    endforeach; ?>

</div>

</body>
</html>