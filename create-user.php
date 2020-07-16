<DOCTYPE html>
    <html>


    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }

    $user = new User();

    ?>

    <form style="margin-left:800px;" method="post">
        First Name: <input type="text" name="first_name">
        <p></p>
        Last Name: <input type="text" name="last_name">
        <p></p>
        E-Mail address: <input type="email" name="email_address">
        <p></p>
        Username: <input type="text" name="username"><br>
        <p></p>
        Password: <input type="password" name="password"><br>
        <p></p>
        <input type="submit" name="submit_button" value="submit">
    </form>


    <?php

    require_once __DIR__ . '/src/functions.php';

    $db = databaseConnect();

    if (
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
        && isset($_POST['email_address'])
        && isset($_POST['username'])
        && isset($_POST['password'])
        && isset($_POST['submit_button'])
    ) {
        $user->setFirstName($_POST['first_name']);
        $user->setFirstName($_POST['last_name']);
        $user->setFirstName($_POST['email_address']);
        $user->setFirstName($_POST['username']);
        $user->setFirstName($_POST['password']);
        $user->save(
            $db
        );
        header("Location: /user-management.php");
    }


    ?>

    </html>