<DOCTYPE html>
    <html>


    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }

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

    $db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

    if (
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
        && isset($_POST['email_address'])
        && isset($_POST['username'])
        && isset($_POST['password'])
        && isset($_POST['submit_button'])
    ) {
        addUser(
            $db,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email_address'],
            $_POST['username'],
            $_POST['password']
        );
        header("Location: /userManagement.php");
    }


    ?>

    </html>