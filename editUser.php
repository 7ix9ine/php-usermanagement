<DOCTYPE html>
    <html>


    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }

    $db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

    $query = $db->query("SELECT * FROM user");
    $user = $query->fetch(\PDO::FETCH_ASSOC);

    $id = $_GET['id'];

    ?>

    <h3 style="text-align: center">You are editing the user with the id: <?php echo $id; ?></h3>


    <form style="text-align: center;" method="post">
        First Name: <input type="text" name="first_name" value="<?php echo $user['first_name'] ?>"><br>
        <p></p>
        Last Name: <input type="text" name="last_name" value="<?php echo $user['last_name'] ?>"><br>
        <p></p>
        E-Mail address: <input type="email" name="email_address" value="<?php echo $user['email_address'] ?>"><br>
        <p></p>
        Username: <input type="text" name="username" value="<?php echo $user['username'] ?>"><br>
        <p></p>
        <input type="submit" name="submit_button" value="submit">
    </form>


    <?php

    require_once __DIR__ . '/functions.php';


    if (
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
        && isset($_POST['email_address'])
        && isset($_POST['username'])
        && isset($_POST['submit_button'])
    ) {
        editUser(
            $db,
            $id,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email_address'],
            $_POST['username']
        );
        header("Location: /userManagement.php");
    }


    ?>

    </html>