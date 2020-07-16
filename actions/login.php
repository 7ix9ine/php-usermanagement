<!DOCTYPE html>
<html>

<?php
session_start(); ?>

<form style="margin-left:800px;" method="post">
    Username: <input type="text" name="username"><br>
    <p></p>
    Password: <input type="password" name="password"><br>
    <p></p>
    <input type="submit" name="submit_button">
</form>

<?php

require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../src/User.php';

$db = databaseConnect();

if (isset($_POST['submit_button'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    if (User::findByUsername($db, $name) !== null) {
        $user = User::findByUsername($db, $name);
        var_dump($user);
        if (password_verify($password, $user->getPassword())) {
            $_SESSION['username'] = $name;
            header("Location: /user-management/actions/user-management.php");
        } else {
            echo "Wrong password or Username";
        }
    }
}

?>

</body>
</html>