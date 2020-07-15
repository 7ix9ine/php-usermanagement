<DOCTYPE html>
    <html>

    <?php

    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }


    require_once __DIR__ . '/src/functions.php';

    $db = new PDO('mysql:host=localhost;dbname=app', 'app', 'app');

    $id = $_GET['id'];

    deleteUsers($db, $id);

    echo "Deleted user with Id: " . $id;
    ?>


    <form action="userManagement.php" method="post">
        <div style="text-align: left"><input name="back_button" type="submit" value="Go Back"/></div>
    </form>

    </html>