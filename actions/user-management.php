<!DOCTYPE html>
<html>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
} ?>


<head>

    <h3> User Management </h3>

    <div style="text-align: right">
        <?php

        if ($_SESSION['username']) {
            echo "Logged in as: " . $_SESSION['username'];
        }

        ?>
    </div>

    <form method="post">
        <div style="text-align: right"><input name="logout_button" type="submit" value="Logout"/></div>
        <?php

        if (isset($_POST['logout_button'])) {
            session_destroy();
            header("Location: /index.php");
        }
        ?>
    </form>


    </div>


</head>


<body>


<?php

require_once __DIR__ . '/src/functions.php';

$db = databaseConnect();

$query = $db->query("SELECT * FROM user");
$user = $query->fetchAll(\PDO::FETCH_ASSOC);
?>

<div>

    <?php
    foreach ($user as $users): ?>
        <li>
            <a href="users/delete.php?id=<?php
            echo $users['id']; ?>">Delete this user</a>
            <a href="users/edit.php?id=<?php
            echo $users['id']; ?>">Edit this user</a><?php
            echo "  id: " . $users['id'], " ", $users['first_name'], " ", $users['last_name'], " ", $users['username'], " ", $users['email_address'] ?>
        </li>
    <?php
    endforeach; ?>

</div>

<form action="users/create.php" method="post">
    <input type="submit" name="submit_button" value="Create/Add Account">
</form>

</body>
</html>